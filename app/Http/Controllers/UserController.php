<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\City;
use App\Models\Page;
use App\Models\User;
use App\Models\Brand;
use App\Models\State;
use App\Models\Booking;
use App\Models\Products;
use App\Models\UserInquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ProductBookingNotification;

class UserController extends Controller
{
    public function myBookings()
    {
        $user = Auth::user(); 
        $bookings = Booking::where("UserID", $user->id)->latest()->paginate(5); 

        return view("bookings.my-bookings", compact("bookings"));
    }
    public function bookingDetails($id)
    {
        $booking = Booking::findOrFail($id);
        return view("bookings.booking-detail", compact("booking"));
    }

    public function bookWithProduct(Request $request,$productId)
    {
        if (!Auth::check()) {
            return redirect()->route("loginPage")->with("error","Please log in to book this product.",);
        }
        $validatedData = $request->validate([
            "fromdate" => "required|date",
            "todate" => "required|date|after_or_equal:fromdate",
            "quantity" => "required|integer",
        ]);
        // Retrieve the quantity from the request data
        $quantity = $request->input('quantity', 1); // Default to 1 if not provided
        $states = State::orderBy('name', 'asc')->get();

        $product = Products::find($productId);
        $rentalPricePerDay = $product->RentalPrice;
        $fromDate = new DateTime($validatedData["fromdate"]);
        $toDate = new DateTime($validatedData["todate"]);
        $interval = $fromDate->diff($toDate); // Calculate the number of days between from date and to date
        $numberOfDays = $interval->days;
        
        // Calculate the total cost
        $totalCost = $rentalPricePerDay * $numberOfDays * $quantity;

        // Convert DateTime objects to formatted date strings
         $fromDateStr = $fromDate->format('Y-m-d');
         $toDateStr = $toDate->format('Y-m-d');


        return view("bookings.book-products", compact('product','states','quantity','totalCost','fromDateStr','toDateStr','numberOfDays'));
    }
    public function bookOrder(Request $request, $bookid)
    {
 
        if (!Auth::check()) {
            return redirect("logout"); 
        }



        // Validate form data
        $validatedData = $request->validate([
            // "fromdate" => "required|date",
            // "todate" => "required|date|after_or_equal:fromdate",
            "usedfor" => "required|string",
            // "quantity" => "required|integer",
            "deladdress" => "required|string",
            "state" => "required|string",
            "city" => "required|string",
            "image" => "required|image|mimes:jpeg,png,gif",
            'GSTNO' => 'required_if:usedfor,Corporate',
        ]);


        $booknumber = mt_rand(100000000, 999999999);

 
        $uid = Auth::id();

   
        $pid = $bookid;

        $product = Products::find($pid);


     // Check if there is enough stock to fulfill the order
        //   if ($quantity > $product->stock_quantity) {
        //       return redirect()
        //           ->back()
        //           ->with("error", "Not enough stock available for this product.");
        //   }
        // Handle file upload
        $addproof = $request->file("image")->store("img", "public");

        $brandId = $product->brand->id;
        $totalCost = $request->input('totalCost');
        $fromdate = $request->input('fromdate');
        $todate = $request->input('todate');
        $quantity = $request->input('quantity');

        $booking = new Booking();
        $booking->BookingNumber = $booknumber;
        $booking->UserID = $uid;
        $booking->ProductID = $pid;
        $booking->FromDate = $fromdate;
        $booking->ToDate = $todate;
        $booking->UsedFor = $validatedData["usedfor"];
        $booking->GSTNO = $validatedData["GSTNO"];
        $booking->StateID = $validatedData["state"];
        $booking->CityID = $validatedData["city"];
        $booking->Quantity =  $quantity;
        $booking->DeliveryAddress = $validatedData["deladdress"];
        $booking->AddressProof = $addproof;
        $booking->TotalCost = $totalCost;
        $booking->BrandID = $brandId;


      // Decrement the stock quantity
      // $product->stock_quantity -= $quantity;
      //  $product->save();
        if ($booking->save()) {
          // Trigger the email notification to admin users
             $admins = User::where('role', 'admin')->get();
             Notification::send($admins, new ProductBookingNotification($booking));
             return redirect()->route('bookings.index')->with("success", "Your product has been booked.");
        } else {
            return redirect()->back()->with("error", "Something Went Wrong. Please try again.");
        }
    }


    public function getBookingDetails($id)
    {
        $booking = Booking::findOrFail($id);
        //  dd($booking);
        return view("bookings.view-booking", compact("booking"));
    }

    public function updateStatus(Request $request, $bookingId)
    {
        $request->validate([
            "status" => "required|in:approved,unapproved",
            "remark" => "nullable|string",
        ]);

        // Find the booking by ID
        $booking = Booking::findOrFail($bookingId);

        // Update the booking status and other attributes
        $booking->status = $request->input("status");
        $booking->Remark = $request->input("remark");
        $booking->RemarkDate = now();

        $booking->save();

        return redirect()
            ->back()
            ->with("success", "Booking status updated successfully.");
    }
    public function dashboard()
    {
        $products = Products::latest()->paginate(8);
        $brands = Brand::orderBy("created_at", "desc")->get();
        return view("dashboard", compact("products", "brands"));
    }
    public function home()
    {
        $products = Products::latest()->paginate(8);
        $brands = Brand::orderBy("created_at", "desc")->get();

        return view("welcome", compact("products", "brands"));
    }
    public function showProductDetails(Request $request, $id)
    {
    
        $product = Products::findOrFail($id);

        return view("products.single-product", compact("product"));
    }
    public function getShopPage()
    {
        $products = Products::latest()->paginate(8);
        return view("products.shop-page", compact("products"));
    }
    public function getLaptopPage()
    {
        $products = Products::where("Type", "Laptop")->latest()->paginate(8);
        return view("guest.laptop", compact("products"));
    }
    public function getDesktopPage()
    {
        $products = Products::where("Type", "Desktop")->latest()->paginate(8);
        return view("guest.desktop", compact("products"));
    }
    public function getAboutUsPage()
    {
        $data = Page::where("PageType", "About-Us")
            ->first();
        return view("guest.about-us", compact("data"));
    }
    public function getContactUsPage()
    {
        $data = Page::where("PageType", "Contact-US")
            ->first();
        return view("guest.contact-us", compact("data"));
    }

    public function search(Request $request)
    {
        $searchText = $request->input('searchtext');

        $products = Products::where('ProductName', 'like', '%' . $searchText . '%')
            ->orWhere('ProductDescription', 'like', '%' . $searchText . '%')
            ->orWhere('Type', 'like', '%' . $searchText . '%')
            ->orWhere('Processor', 'like', '%' . $searchText . '%')
            ->orWhere('Screen', 'like', '%' . $searchText . '%')
            ->orWhere('RAM', 'like', '%' . $searchText . '%')
            ->orWhere('Storage', 'like', '%' . $searchText . '%')
            ->orWhere('Charges', 'like', '%' . $searchText . '%')
            ->orWhere('RentalPrice', 'like', '%' . $searchText . '%')
            ->orWhere('ProductModel', 'like', '%' . $searchText . '%')
            ->paginate(8);

        return view('guest.search-results', compact('products', 'searchText'));
    }
    public function showInvoice($invid)
    {
        $booking = Booking::where('id', $invid)->first(); 

        if (!$booking) {
            abort(404); 
        }

        return view('bookings.invoice', compact('booking'));
    }
    
public function storeUserInquiry(Request $request)
{
    $request->validate([
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'phone' => 'required|string',
        'email' => 'required|email',
        'message' => 'required|string',
    ]);


    $inquiry = new UserInquiry();
    $inquiry->first_name = $request->first_name;
    $inquiry->last_name = $request->last_name;
    $inquiry->phone = $request->phone;
    $inquiry->email = $request->email;
    $inquiry->message = $request->message;

    $inquiry->save();

    return redirect()->back() ->with("success", "Thank you for reaching out!");
}
public function getCities(Request $request)
{
   $stateId = $request->input('stateId');
   $cities = City::where('state_id', $stateId)->get();
   return response()->json($cities);
}
}
