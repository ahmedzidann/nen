<div class="dropdown bootstrap-select default-select form-control wide">
    <select id="inputState" name="{{ $name??'status' }}" class="default-select form-control wide">
        <option selected="" disabled>{{ TranslationHelper::translate('Choose...') }}</option>
        @foreach ($foreach??App\Models\Admin::STATUS as $item)
            @if (isset($model))
            {{--  edit  --}}
            <option value="{{$item}}" {{ $item == $model->$name ?'selected':''}}>{{$item}}</option>
            @else
            {{--  create  --}}
          <option value="{{ $item }}" @if (old($name??'status')==$item) {{ 'selected' }} @endif>{{ $item }}</option>
            @endif
        @endforeach
    </select>
</div>
