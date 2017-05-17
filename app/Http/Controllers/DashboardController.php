<?php

namespace App\Http\Controllers;

use App\Agreement;
use App\Category;
use App\Message;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ImageResize;


class DashboardController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view("dashboard.add_product", ['categories' => $categories]);
    }


    /*
     * Products
     *
     */

    public function getAddProduct()
    {
        $categories = Category::all();

        return view("dashboard.add_product", ['categories' => $categories]);
    }


    public function postAddProduct(Request $request)
    {
        //validate all inputs
        $this->validate($request, [
            'name' => 'required|max:120',
            'price' => 'required|max:120',
            'year' => 'required|max:20',
            'description' => 'required|max:20000',
            'category_id' => 'required',
        ]);


        $user_id = 0;

        if (Auth::check()) {
            $user_id = Auth::user()->id;
        }

        $product = new Product();
        $product->name = $request->name;
        $product->user_id = $user_id;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->year = $request->year;
        $product->description = $request->description;
        $product->image = "";

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $product->image = $this->imageUpload($file);
        }

        if ($product->save()) {
            return redirect('/add-product')->with(['success' => "Product added successfully!"]);
        }

        return redirect()->back()->with(['error' => "There was a problem while adding product!"]);
    }

    public function getUpdateProduct($id)
    {
        $categories = Category::all();
        $product = Product::where('id', $id)->first();

        return view("dashboard.update_product", ['categories' => $categories, 'product' => $product]);
    }

    public function postUpdateProduct(Request $request)
    {
        //validate all inputs
        $this->validate($request, [
            'name' => 'required|max:120',
            'price' => 'required|max:120',
            'year' => 'required|max:20',
            'description' => 'required|max:20000',
            'category_id' => 'required',
        ]);

        $product = Product::where('id', $request->id)->first();

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->year = $request->year;
        $product->description = $request->description;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $product->image = $this->imageUpload($file);
        }

        if ($product->update()) {
            return redirect('/products')->with(['success' => "Product updated successfully!"]);
        }

        return redirect()->back()->with(['error' => "There was a problem while updating product!"]);
    }

    public function postDeleteProduct(Request $request)
    {
        $product = Product::where('id', $request->id)->first();

        if ($product) {
            if ($product->delete()) {
                return redirect('/products')->with(['success' => "Product deleted successfully!"]);
            }
        }
        return redirect()->back()->with(['error' => "There was a problem while deleting the product!"]);
    }


    public function getProducts()
    {
        $user_id = 0;
        $role = 2;
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $role = Auth::user()->role;
        }

        if ($role == 1) {
            $products = Product::orderBy('id', 'desc')->get();
        } else {
            $products = Product::where('user_id', $user_id)->orderBy('id', 'desc')->get();
        }

        return view("dashboard.products", ['products' => $products]);
    }

    public function postReportProduct(Request $request)
    {
        $product = Product::where('id', $request->id)->first();

        if ($product) {
            $product->report = 1;
            $product->update();
        }

        return redirect()->back();
    }

    /*
     * Categories
     *
     */

    public function getAddCategory()
    {
        return view("dashboard.add_category");
    }


    public function postAddCategory(Request $request)
    {
        //validate all inputs
        $this->validate($request, [
            'name' => 'required|max:120',
        ]);


        $category = new Category();
        $category->name = $request->name;

        if ($category->save()) {
            return redirect('/add-category')->with(['success' => "Category added successfully!"]);
        }

        return redirect()->back()->with(['error' => "There was a problem while adding category!"]);
    }


    public function getUpdateCategory($id)
    {
        $category = Category::where('id', $id)->first();
        return view("dashboard.update_category", ['category' => $category]);
    }


    public function postUpdateCategory(Request $request)
    {
        //validate all inputs
        $this->validate($request, [
            'name' => 'required|max:120',
        ]);


        $category = Category::where('id', $request->id)->first();
        $category->name = $request->name;

        if ($category->update()) {
            return redirect('/categories')->with(['success' => "Category updated successfully!"]);
        }

        return redirect()->back()->with(['error' => "There was a problem while updating the category!"]);
    }


    public function getCategories()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view("dashboard.categories", ['categories' => $categories]);
    }


    public function postDeleteCategory(Request $request)
    {
        $category = Category::where('id', $request->id)->first();

        $post = Product::where('category_id', $request->id)->first();

        if ($post) {
            return redirect()->back()->with(['error' => "Because this category have products you can not delete this category!"]);
        }

        if ($category) {
            if ($category->delete()) {
                return redirect('/categories')->with(['success' => "Category deleted successfully!"]);
            }
        }
        return redirect()->back()->with(['error' => "There was a problem while deleting the category!"]);
    }


    public function getReports()
    {
        $products = Product::where('report', 1)->get();
        return view("dashboard.reports", ['products' => $products]);
    }


    public function imageUpload($file)
    {
        $name = "image_" . uniqid() . "." . $file->getClientOriginalExtension();
        $destinationPath = public_path('uploads');
        $file->move($destinationPath, $name);
        return "uploads/" . $name;
    }


    /*
     * Messages
     *
     */
    public function getSendMessage($id)
    {
        $categories = Category::all();
        $receiver = User::where('id', $id)->first();
        return view("send_message", ['receiver' => $receiver, 'categories' => $categories]);
    }

    public function postSendMessage(Request $request)
    {
        $this->validate($request, [
            'topic' => 'required|max:300',
            'message' => 'required|max:3000',
        ]);

        $parent_id = 0;

        if ($request['parent_id']) {
            $parent_id = $request['parent_id'];
        }

        $message = new Message();
        $message->sender_id = Auth::user()->id;
        $message->receiver_id = $request->receiver_id;
        $message->parent_id = $parent_id;
        $message->topic = $request->topic;
        $message->message = $request->message;

        if ($message->save()) {
            return redirect()->back()->with(['success' => "Message sent successfully!"]);
        }

        return redirect()->back()->with(['error' => "There was a problem while sending the message!"]);
    }


    public function getMessages()
    {

        $id = Auth::user()->id;

        $messages = Message::where('parent_id', 0)->orderBy('id', 'desc')->get();

        return view("dashboard.messages", ['messages' => $messages]);
    }

    public function getMessage($id)
    {
        $parent_message = Message::where('id', $id)->first();

        if (!$parent_message) {
            return redirect('/messages');
        }

        $messages = Message::where('parent_id', $id)->orwhere('id', $id)->get();

        return view("dashboard.message", ['messages' => $messages, 'parent_message' => $parent_message]);
    }

    public function postDeleteMessage(Request $request)
    {
        $message = Message::where('id', $request->id)->first();

        if ($message) {
            if ($message->delete()) {

                //delete sub messages
                $sub_messages = Message::where('parent_id', $request->id)->get();
                foreach ($sub_messages as $item) {
                    $item->delete();
                }


                return redirect('/messages')->with(['success' => "Message deleted successfully!"]);
            }
        }
        return redirect()->back()->with(['error' => "There was a problem while deleting the message!"]);
    }

}