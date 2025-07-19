<select class="form-select" id={{ isset($id) ? $id : '' }} value="" name="{{ isset($name) ? $name : '' }}">
    <option selected="" value="" {{ isset($disabled) ? 'disabled' : '' }}>Select
        {{ isset($nameselect) ? $nameselect : '' }}</option>
    @foreach ($foreach as $item)
        @if (isset($model->id))
            {{--  edit  --}}
            <option value="{{ $item->id }}" @if (isset($name)) {{ $item->id == $model->$name ? 'selected' : '' }} @endif @isset($param)
                {{ $item->id == $param ? 'selected' : '' }} 
            @endisset>{{ $item->name }}
            </option>
        @else
            {{--  create  --}}
            <option value="{{ $item->id }}" @if (old(isset($name) ? $name : '') == $item->id) {{ 'selected' }} @endif>
                {{ $item->name ??  $item->title }}</option>
        @endif
    @endforeach
</select>
