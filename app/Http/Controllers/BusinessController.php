<?php

namespace App\Http\Controllers;

use App\Bussiness;
use App\PaymentDetails;
use Illuminate\Http\Request;
use Image;
use App\SiteImage;
use Illuminate\Support\Facades\File;

class BusinessController extends Controller
{

    public function index()
    {

        return view('admin.index');
    }
    public function all()
    {
        $businesses = Bussiness::with('products')->orderBy('id', 'desc')->get();
        return view('admin.business.list-vendor', compact('businesses'));
    }
    public function destroy($id)
    {
        Bussiness::find($id)->delete();
        return redirect()->back()->with('success', 'Company Deleted.');
    }
    public function profile()
    {
        $business = Bussiness::where('user_id', auth()->user()->id)->with('image')->first();
        // dd($business);
        $payment = PaymentDetails::where('user_id', auth()->user()->id)->first();

        return view('admin.business.profile', compact('business', 'payment'));
    }

    public function paymentUpdate(Request $request)
    {

        $validated = $this->validate($request, [
            'card_name' => 'required|string',
            'card_no' => 'required|numeric|digits:16',
            'expiry_date' => 'required|date_format:m-Y',
            'cvc' => 'required|numeric|digits:3|'
        ]);
        if ($request->id) {
            PaymentDetails::find($request->id)->update($validated);
        } else {
            $validated['user_id'] = auth()->user()->id;
            PaymentDetails::create($validated);
        }
        return redirect()->back()->with('success', 'Payment Details updated.');
    }

    public function profileUpdate(Request $request)
    {
        // dd($request->all());
        $validated = $this->validate($request, [
            'name' => 'required|string|max:255',
            'address' => 'nullable|string',
            'opening_hours' => 'nullable|string',
            'mobile' => 'required|numeric|digits_between:11,13',
            'doesShip' => 'required|boolean',
            'max_delivery_time' => 'required_if:doesShip,true',
            'delivery_areas' => 'required_if:doesShip,true',
            'description' => 'required|string'
        ]);

        $business = Bussiness::find($request->id);
        $business->update($validated);

        if ($request->hasFile('image')) {
            if ($business->image != null) {
                $businessImage = $business->image;
                $imgURL = "business_image/" . $businessImage->image;
                if (File::exists($imgURL)) {
                    File::delete($imgURL);
                    $businessImage->image = $this->businessImageUpload($request->image, $request->name);
                    $businessImage->update();
                }
            } else {
                $image = new SiteImage;
                $image->image = $this->businessImageUpload($request->image, $request->name);
                $business->image()->save($image);
            }
        }
        return redirect()->back()->with('success', 'Details Updated successfully.');
    }
    
    protected function businessImageUpload($image, $name)
    {
        $image_upload = $image;
        $fileName = str_replace(' ', '-', $name) . "." . $image_upload->getClientOriginalExtension();
        Image::make($image_upload)->resize(400, 380)->save(base_path('public/business_image/' . $fileName));
        //Image quality   save(base_path('url'), 50);   this 50% image quality will be save
        return $fileName;
    }
}
