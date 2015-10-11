<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="id" value="{{ $value->id or '' }}">
<dl class="form-group">
    <dt><label for="product-name">Product name:</label></dt>
    <dd><input type="text" name="name" id="product-name" class="form-control" value="{{ $value->name or old('name') }}"></dd>
</dl>
<dl class="form-group">
    <dt><label for="product-code">Code:</label></dt>
    <dd><input type="text" name="code" id="product-code" class="form-control" value="{{ $value->code or old('code') }}"></dd>
</dl>
<dl class="form-group">
    <dt><label for="product-price">Price:</label></dt>
    <dd><input type="text" name="price" id="product-price" class="form-control" value="{{ $value->name or old('price') }}"></dd>
</dl>
