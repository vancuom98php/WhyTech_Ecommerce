<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Gallery;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    use StorageImageTrait;

    /**
     * 
     * @param  int  $id
     * Display specified of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $product = Product::find($id);
        return view('admin.gallery.all_gallery', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @param  int  $id
     * 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $gallery_images = $request->file('gallery_images');
        if ($gallery_images) {
            foreach ($gallery_images as $gallery_image) {
                $dataUploadFeatureImage = $this->storageTraitUploadGallery($gallery_image, 'gallery');

                if (!empty($dataUploadFeatureImage)) {
                    $dataGalleryCreate['gallery_name'] = $dataUploadFeatureImage['file_name'];
                    $dataGalleryCreate['gallery_image'] = $dataUploadFeatureImage['file_path'];
                }

                $dataGalleryCreate['product_id'] = $id;

                $gallery = Gallery::create($dataGalleryCreate);
            }
        }

        session()->flash('notification', 'Tải ảnh thành công');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $product_id = $request->productId;
        $galleries = Gallery::where('product_id', $product_id)->get();
        $output = '
        <form method="post" enctype="multipart/form-data">
            ' . csrf_field() . '
            <table class="table">
                <thead>
                    <tr>
                        <th data-breakpoints="xs" scope="col">ID</th>
                        <th scope="col">Tên hình ảnh</th>
                        <th scope="col">Hình ảnh</th>
                        <th data-breakpoints="xs" scope="col" width="80px"></th>
                    </tr>
                </thead>
                <tbody>
        ';
        if ($galleries->count() > 0) {
            foreach ($galleries as $key => $gallery) {
                $output .= '
                <tr>
                    <td>' . ++$key . '</td>
                    <td contenteditable class="edit_gallery_name" data-gallery_id="' . $gallery->gallery_id . '">' . $gallery->gallery_name . '</td>
                    <td>
                        <img width="70px" height="70px" src="' . asset($gallery->gallery_image) . '"
                        alt="' . $gallery->gallery_name . '">
                        <input type="file" class="gallery_image" style="width:70%" data-gallery_id="' . $gallery->gallery_id . '" 
                        id="image-' . $gallery->gallery_id . '" name="gallery_image" accept="image/*">
                    </td>
                    <td>
                        <button type="button" data-gallery_id="' . $gallery->gallery_id . '" class="btn btn-sm btn-danger delete_gallery"><i class="far fa-trash-alt"></i></button>
                    </td>
                </tr>
                ';
            }
        } else {
            $output .= '
                    <tr>
                        <td colspan="4" style="font-size: 16px">
                            <div class="alert alert-danger" role="alert">Sản phẩm chưa có ảnh nào trong thư viện</div>
                        </td>
                    </tr>
            ';
        }
        $output .= '
                </tbody>
            </table>
        </form>
        ';

        echo $output;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_name(Request $request)
    {
        $gallery_id = $request->gallery_id;
        $gallery_name = $request->gallery_name;

        $gallery = Gallery::find($gallery_id)->update([
            'gallery_name' => $gallery_name,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $gallery_id = $request->gallery_id;
        $gallery_image = $request->file('gallery_image');

        $gallery = Gallery::find($gallery_id);

        $dataUploadFeatureImage = $this->storageTraitUploadGallery($gallery_image, 'gallery');

        if (!empty($dataUploadFeatureImage)) {
            File::delete(public_path($gallery->gallery_image));
            $gallery_image = $dataUploadFeatureImage['file_path'];
        }

        $gallery->update(['gallery_image' => $gallery_image]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $gallery_id = $request->gallery_id;
        $gallery = Gallery::find($gallery_id);

        File::delete(public_path($gallery->gallery_image));
        $gallery->delete();
    }
}
