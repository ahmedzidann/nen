{{-- start editor  --}}
<textarea rows="4"   id="{{ $id??'' }}" class="form-control" placeholder="{{ $placeholder??'' }}"  {{ $required ?? ''}} name="{{ ($name)??'' }}" />{{isset($value) ? $value : old($old??'')}}</textarea>
{{-- end editor  --}}