<div class="m-portlet__body">

    @inject('book','\App\Book')
    <div class="form-group m-form__group">
        <label> name </label>

        {!! Form::text('name',null,['class'=>'form-control m-input','placeholder'=>'name'])!!}
    </div>
    <div class="form-group m-form__group">
        <label> description</label>
        {!! Form::textarea('description',null,['class'=>'form-control m-input','placeholder'=>'description'])!!}
    </div>

    <div class="form-group m-form__group">
        <label>category</label>
        {!! Form::select('category_id',\App\Category::pluck('name','id'),null,['class'=>'form-control m-input select2'])!!}
    </div>

    <div class="form-group m-form__group">
        <label>price</label>
        {!! Form::number('price',null,['class'=>'form-control m-input '])!!}
    </div>


    <div class="form-group m-form__group">
        <label>quantity</label>
        {!! Form::number('quantity',null,['class'=>'form-control m-input '])!!}
    </div>

    <div class="form-group m-form__group">
        <label> auther </label>

        {!! Form::text('auther',null,['class'=>'form-control m-input','placeholder'=>'auther'])!!}
    </div>

    {{-- @if(isset($book))
    <div class="m-content">
        <div class="row">
            <div class="col-md-2" id ='image-curd'>
                <img src="{!!asset($book->image)!!}" alt="images" width="150px" height="100px" >
            </div>
        </div>
    </div>
    @endif --}}
    <div class="form-group m-form__group">
        <label> image </label>
        <input type="file" class="form-control m-input" name="image">
    </div>
</div>

