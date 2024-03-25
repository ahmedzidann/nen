<select class="form-select" id={{isset($id)?$id:''}} value=""  name="{{$name}}" {{ $required??'' }}>
    <option selected="" value="" {{isset($disabled)?$disabled:''}}>{{ TranslationHelper::translate(ucfirst('Select '.$nameselect)??'') }}</option>
    @foreach ($foreach as $item)
    {{--  edit  --}}
    @if (!empty($model))
     {{-- edit  --}}
    <option value="{{$item??''}}" {{ $item == $model ?'selected':''}}>{{$item??''}}</option>
    @else
     {{-- create  --}}
    <option value="{{$item??''}}" @if (old($name)) {{ 'selected' }} @endif >{{$item??''}}</option>
    @endif
    @endforeach
</select>