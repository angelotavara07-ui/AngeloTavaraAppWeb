<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
class ProductController extends Controller
{
/**
* Display a listing of the resource.
*/
public function index()
{
$products = Product::all();
return ProductResource::collection($products);
}
/**
* Store a newly created resource in storage.
*/
public function store(Request $request)
{
$product = Product::create($request->validated());
return new ProductResource($product);
}
/**
* Display the specified resource.
*/
public function show(string $id)
{
$product = Product::findOrFail($id);
return new ProductResource($product);
}
/**
* Update the specified resource in storage.
*/
public function update(Request $request, string $id)
{
$product = Product::findOrFail($id);
$product->update($request->validated());
return new ProductResource($product);
}
/**
* Remove the specified resource from storage.
*/
public function destroy(string $id)
{
$product = Product::findOrFail($id);
$product->delete();
return response()->json(null, 204);
}
}
?>






<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class StoreProductRequest extends FormRequest
{
/**
* Determine if the user is authorized to make this request.
*/
public function authorize(): bool
{
    return false;
    }
    /**
    * Get the validation rules that apply to the request.
    *
    * @return array<string,
    \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
    */
    public function rules(): array
    {
    return [
    'name' => 'required|string|max:255',
    'description' => 'nullable|string',
    'sku' => 'required|string|max:255',
    'stock' => 'required|numeric',
    'price' => 'required|integer',
    'is_active' => 'nullable|boolean',
    ];
    }
    }
?>








<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class UpdateProductRequest extends FormRequest
{
/**
* Determine if the user is authorized to make this request.
*/
public function authorize(): bool
{
return false;
}
/**
* Get the validation rules that apply to the request.
*
* @return array<string,\Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
*/
public function rules(): array
{
return [
'name' => 'required|string|max:255',
'description' => 'nullable|string',
'sku' => 'required|string|max:255',
'stock' => 'required|numeric',
'price' => 'required|integer',
'is_active' => 'nullable|boolean',
];
}
}

?>









<?php
namespace App\Http\Resources;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
class ProductResource extends JsonResource
{
/**
* Transform the resource into an array.
*
* @return array<string, mixed>
*/
public function toArray(Request $request)
{
/*return parent::toArray($request);*/
return [
'id' => $this->id,
'name' => $this->name,
'description' => $this->description,
'sku' => $this->sku,
'stock' => $this->stock,
'price' => $this->price,
'is_active' => $this->is_active,
'created_at' => $this->created_at,
'updated_at' => $this->updated_at,
];
}
}
?>











<?php
//use App\Http\Controllers\Api\ProductController;
//Route::apiResource('products', ProductController::class);
?>








