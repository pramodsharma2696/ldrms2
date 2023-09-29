<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Page;
use App\Models\User;
use App\Models\Brand;
use App\Models\Booking;
use App\Models\Products;
use App\Models\UserInquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //Handling Brands
    public function brandIndex()
    {
        $brands = Brand::orderBy("created_at", "desc")->paginate(5);

        return view("brands.index", compact("brands"));
    }
    public function createBrand()
    {
        return view("admin.add-brand");
    }
    public function editBrand($id)
    {
        $brand = Brand::findOrFail($id);

        return view("brands.edit", compact("brand"));
    }
    public function deleteBrand($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return redirect()
            ->route("brand.index")
            ->with("success", "Brand deleted successfully");
    }
    public function updateBrand(Request $request, $id)
    {
        $brand = Brand::find($id);
        $brand->BrandName = $request->input("brandname");

        if ($request->hasFile("brandlogo")) {
            if ($brand->BrandLogo) {
                Storage::delete("images/" . $brand->BrandLogo);
            }
            $brandlogo =
                md5($request->file("brandlogo")->getClientOriginalName()) .
                "." .
                $request->file("brandlogo")->getClientOriginalExtension();

            $request
                ->file("brandlogo")
                ->move(public_path("images"), $brandlogo);

            $brand->BrandLogo = $brandlogo;
        }

        $brand->save();

        return redirect()
            ->route("brand.index")
            ->with("success", "Brand updated successfully");
    }
    public function storeBrand(Request $request)
    {
        // Validate the form data
        $request->validate([
            "brandname" => "required|string|max:255",
            "images" => "required|image|mimes:jpg,jpeg,png,gif",
        ]);

        $bname = $request->input("brandname");
        $logo = $request->file("images");

        // Generate a unique file name for the logo
        $brandlogo =
            md5($logo->getClientOriginalName()) .
            "." .
            $logo->getClientOriginalExtension();

        $logo->move(public_path("images"), $brandlogo);

        $brand = new Brand();
        $brand->BrandName = $bname;
        $brand->BrandLogo = $brandlogo;
        $brand->save();

        return redirect()
            ->route("brand.index")
            ->with("success", "Brand details have been Created Successfully.");
    }
    //End of handling Brands


    //Handling Products
      public function createProduct()
      {
          $brands = Brand::orderBy("created_at", "desc")->get();
          return view("admin.add-products", compact("brands"));
      }
      public function storeProduct(Request $request)
      {
          $request->validate([
              "type" => "required",
              "brand" => "required",
              "proname" => "required",
              "screen" => "required",
              "ram" => "required",
              "storage" => "required",
              "charges" => "required",
              "processor" => "required",
              "renprice" => "required",
              "modyrs" => "required",
              "prodesc" => "required",
            //   "stock_quantity" => "required|integer|min:0",
              "image0" => "required|image|mimes:jpg,jpeg,png,gif",
              "image1" => "required|image|mimes:jpg,jpeg,png,gif",
              "image2" => "required|image|mimes:jpg,jpeg,png,gif",
              "image3" => "required|image|mimes:jpg,jpeg,png,gif",
              "image4" => "required|image|mimes:jpg,jpeg,png,gif",
              "image5" => "required|image|mimes:jpg,jpeg,png,gif",
          ]);
  
          // Handle file uploads
          $imageNames = [];
  
          for ($i = 0; $i < 6; $i++) {
              $imageKey = "image{$i}";
  
              if ($request->hasFile($imageKey)) {
                  $propic = $request->file($imageKey);
  
                  // Generate a unique file name for each product image
                  $propicName =
                      md5($propic->getClientOriginalName()) .
                      "." .
                      $propic->getClientOriginalExtension();
  
                  $propic->move(public_path("products/images"), $propicName);
  
                  $imageNames[$imageKey] = $propicName;
              } else {
                  $imageNames[$imageKey] = null;
              }
          }
  
          // Create a new Product record
          $product = new Products([
              "Type" => $request->input("type"),
              "BrandID" => $request->input("brand"),
              "ProductName" => $request->input("proname"),
              "Processor" => $request->input("processor"),
              "Screen" => $request->input("screen"),
              "RAM" => $request->input("ram"),
              "Storage" => $request->input("storage"),
              "Charges" => $request->input("charges"),
              "RentalPrice" => $request->input("renprice"),
              "ProductModel" => $request->input("modyrs"),
              "ProductDescription" => $request->input("prodesc"),
            //   "stock_quantity" => $request->input("stock_quantity"),
          ]);
          $product->Image = $imageNames["image0"] ?? null;
          $product->Image1 = $imageNames["image1"] ?? null;
          $product->Image2 = $imageNames["image2"] ?? null;
          $product->Image3 = $imageNames["image3"] ?? null;
          $product->Image4 = $imageNames["image4"] ?? null;
          $product->Image5 = $imageNames["image5"] ?? null;
          $product->save();
  
          return redirect()
              ->route("create-product")
              ->with("success", "Product details have been added.");
      }
      public function productIndex()
      {
          $products = Products::orderBy("created_at", "desc")->paginate(5);
  
          return view("products.index", compact("products"));
      }
      public function deleteProduct($id)
      {
          // Find the product by ID
          $product = Products::find($id);
  
          if (!$product) {
              return redirect()
                  ->route("products.index")
                  ->with("error", "Product not found.");
          }

          // Delete associated booking records
        //   $product->bookings()->delete();

  
          // Delete the product and its associated images
          Storage::delete([
              $product->Image,
              $product->Image1,
              $product->Image2,
              $product->Image3,
              $product->Image4,
              $product->Image5,
          ]);
          $product->delete();
  
          return redirect()
              ->route("products.index")
              ->with("success", "Product has been deleted.");
      }
      public function updateProduct(Request $request, $id)
      {
          $request->validate([
              "type" => "required",
              "brand" => "required",
              "proname" => "required",
              "screen" => "required",
              "ram" => "required",
              "storage" => "required",
              "charges" => "required",
              "processor" => "required",
              "renprice" => "required",
              "modyrs" => "required",
              "prodesc" => "required",
          ]);
  
          // Find the product by ID
          $product = Products::find($id);
  
          // Check if the product exists
          if (!$product) {
              return redirect()
                  ->route("products.index")
                  ->with("error", "Product not found.");
          }
          // Handle file uploads for product images
          $imageFields = [
              "image",
              "image1",
              "image2",
              "image3",
              "image4",
              "image5",
          ];
  
          foreach ($imageFields as $imageField) {
              if ($request->hasFile($imageField)) {
                  // Delete the existing product image, if it exists
                  if ($product->$imageField) {
                      Storage::delete("products/images/{$product->$imageField}");
                  }
                  // Generate a unique file name for the new image
                  $imageName =
                      md5($request->file($imageField)->getClientOriginalName()) .
                      "." .
                      $request->file($imageField)->getClientOriginalExtension();
  

                  $request
                      ->file($imageField)
                      ->move(public_path("products/images"), $imageName);
  
                  $product->$imageField = $imageName;
              }
          }
  
          $product->update([
              "Type" => $request->input("type"),
              "BrandID" => $request->input("brand"),
              "ProductName" => $request->input("proname"),
              "Processor" => $request->input("processor"),
              "Screen" => $request->input("screen"),
              "RAM" => $request->input("ram"),
              "Storage" => $request->input("storage"),
              "Charges" => $request->input("charges"),
              "RentalPrice" => $request->input("renprice"),
              "ProductModel" => $request->input("modyrs"),
              "ProductDescription" => $request->input("prodesc"),
          ]);
  
          $product->save();
  
          return redirect()
              ->route("products.index")
              ->with("success", "Product has been updated.");
      }
      public function editProducts($id)
      {
          $product = Products::findOrFail($id);
          $brands = Brand::orderBy("created_at", "desc")->get();
  
          return view("products.edit", compact("product", "brands"));
      }
  
        //End of Handling Products
  
    public function dashboard()
    {
        $brandCount = Brand::count();
        $productCount = Products::count();
        $totalBookingCount = Booking::count();
        $approvedCount = Booking::where("status", "approved")->count();
        $unapprovedCount = Booking::where("status", "unapproved")->count();
        $newCount = Booking::where("status", "new")->count();
        return view(
            "admin.dashboard",
            compact(
                "brandCount",
                "productCount",
                "approvedCount",
                "unapprovedCount",
                "newCount",
                "totalBookingCount",
            ),
        );
    }

    public function regUsers()
    {
        $users = User::orderBy("created_at", "desc")->paginate(5);
        return view("admin.reg-users", compact("users"));
    }
    public function getAboutUs()
    {
        $aboutUs = Page::where('PageType', 'About-Us')->first();
        return view("admin.about-us", compact('aboutUs'));
    }

    public function storeAboutUs(Request $request)
    {
        $request->validate([
            "pagetitle" => "required|string",
            "pagedescription" => "required|string",
        ]);
        $aboutUs = Page::where('PageType', 'About-Us')->first();

        if ($aboutUs) {
            $aboutUs->update([
                "PageTitle" => $request->input("pagetitle"),
                "PageDescription" => $request->input("pagedescription"),
            ]);
        } else {
            $page = new Page([
                "PageType" => "About-Us",
                "PageTitle" => $request->input("pagetitle"),
                "PageDescription" =>$request->input("pagedescription"),
            ]);
            $page->save();
        }
    
        return redirect()
            ->back()
            ->with("success", "Data updated successfully! It will be reflected on the About Us page.");
    }
    public function getContactUs()
    {
        $contactUs = Page::where('PageType', 'Contact-Us')->first();
        return view("admin.contact-us", compact('contactUs'));
    }
    public function storeContactUs(Request $request)
    {
        $validatedData = $request->validate([
            "pagetitle" => "required|string",
            "pagedescription" => "required|string",
            "email" => "required|email",
            "phonenum" => "required|numeric|digits:10",
        ]);

        $contactUs = Page::where('PageType', 'Contact-Us')->first();
    
        if ($contactUs) {
 
            $contactUs->update([
                "PageTitle" => $validatedData["pagetitle"],
                "PageDescription" =>$validatedData["pagedescription"],
                "Email" => $validatedData["email"],
                "MobileNumber" => $validatedData["phonenum"],
            ]);
        } else {
            $page = new Page([
                "PageType" => "Contact-Us",
                "PageTitle" => $validatedData["pagetitle"],
                "PageDescription" => $validatedData["pagedescription"],
                "Email" => $validatedData["email"],
                "MobileNumber" => $validatedData["phonenum"],
            ]);
            $page->save();
        }
    
        return redirect()
            ->back()
            ->with("success", "Data updated successfully! It will be reflected on the Contact Us page.");
    }
    public function betweenDatesReportForm()
    {
        return view("reports.between_dates_report");
    }

    public function generateBetweenDatesReport(Request $request)
    {
        $fromDate = $request->input("fromdate");
        $toDate = $request->input("todate");

        $bookings = Booking::whereBetween("DateofBooking", [
            $fromDate,
            $toDate,
        ])->get();
        $fdate = $fromDate;
        $tdate = $toDate;
        return view(
            "reports.report_results",
            compact("bookings", "fdate", "tdate"),
        );
    }
    public function requestCountReportForm()
    {
        return view("reports.count_report");
    }

    public function generateRequestCountReport(Request $request)
    {
        $fromDate = $request->input("fromdate");
        $toDate = $request->input("todate");

        $requestCount = Booking::whereBetween("created_at", [
            $fromDate,
            $toDate,
        ])->count();
        $fdate = $fromDate;
        $tdate = $toDate;
        return view(
            "reports.count_result",
            compact("requestCount", "fdate", "tdate"),
        );
    }
    public function salesReportForm()
    {
        return view("reports.sales_report");
    }
    public function generateSalesReport(Request $request)
    {
        $fromDate = $request->input("fromdate");
        $toDate = $request->input("todate");
        $requestType = $request->input("requesttype");

        if ($requestType === "mtwise") {
            $salesData = Booking::selectRaw(
                "MONTH(DateofBooking) as lmonth, YEAR(DateofBooking) as lyear, SUM(TotalCost) as totalprice",
            )
                ->whereBetween("DateofBooking", [$fromDate, $toDate])
                ->where("status", "approved")
                ->groupBy("lyear", "lmonth")
                ->get();
        } else {
            $salesData = Booking::selectRaw(
                "YEAR(DateofBooking) as lyear, SUM(TotalCost) as totalprice",
            )
                ->whereBetween("DateofBooking", [$fromDate, $toDate])
                ->where("status", "approved")
                ->groupBy("lyear")
                ->get();
        }

        return view("reports.sales_result", [
            "fromDate" => $fromDate,
            "toDate" => $toDate,
            "requestType" => $requestType,
            "salesData" => $salesData,
        ]);
    }

    public function searchForm()
    {
        return view("admin.search_results");
    }

    public function searchBooking(Request $request)
    {
        $searchData = $request->input("searchdata");

        $bookings = Booking::select(
            "bookings.id as bid",
            "bookings.status",
            "bookings.UserID",
            "bookings.ProductID",
            "bookings.BookingNumber",
            "bookings.FromDate",
            "bookings.ToDate",
            "bookings.UsedFor",
            "bookings.Quantity",
            "bookings.DeliveryAddress",
            "bookings.AddressProof",
            "bookings.DateofBooking",
            "bookings.Status",
            "users.first_name",
            "users.last_name",
            "users.email",
            "users.mobile_number",
            "products.ProductName",
        )
            ->join("users", "users.id", "=", "bookings.UserID")
            ->join("products", "products.id", "=", "bookings.ProductID")
            ->where(function ($query) use ($searchData) {
                $query
                    ->where(
                        "bookings.BookingNumber",
                        "like",
                        "%" . $searchData . "%",
                    )
                    ->orWhere(
                        "users.first_name",
                        "like",
                        "%" . $searchData . "%",
                    )
                    ->orWhere(
                        "users.mobile_number",
                        "like",
                        "%" . $searchData . "%",
                    )
                    ->orWhere("users.email", "like", "%" . $searchData . "%");
            })
            ->latest('bookings.created_at')
            ->paginate(8); 

        return view("admin.search_results", compact("bookings", "searchData"));
    }
    public function getNewBookings()
    {
        $newBookings = Booking::where("status", "new")->latest()->paginate(5);

        return view("bookings.new-bookings", compact("newBookings"));
    }
    public function getApprovedBookings()
    {
        $approvedBookings = Booking::where("status", "approved")->latest()->paginate(5);

        return view("bookings.approved-bookings", compact("approvedBookings"));
    }
    public function getUnApprovedBookings()
    {
        $unApprovedBookings = Booking::where("status", "unapproved")->latest()->paginate(5);

        return view(
            "bookings.unapproved-bookings",
            compact("unApprovedBookings"),
        );
    }
    public function getAllBookings()
    {
        $getAllBookings = Booking::orderBy("created_at", "desc")->paginate(5);

        return view("bookings.all-bookings", compact("getAllBookings"));
    }
    public function getUserInquiry()
    {
        $getQueries = UserInquiry::orderBy("created_at", "desc")->paginate(5);

        return view("inquiry.index", compact("getQueries"));
    }
    public function viewUserInquiry($id)
    {
        $query = UserInquiry::findorFail($id);
        return view("inquiry.view-query", compact("query"));
    }
    public function deleteUserInquiry($id)
    {
        $query = UserInquiry::findorFail($id);
        $query->delete();
        return redirect()->back()->with('success',"Record Deleted Successfully");
    }
}
