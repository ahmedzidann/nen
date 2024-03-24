<input type="{{ $type??'' }}" name="{{ ($name)??'' }}"  value="{{isset($value) ? $value : old($old??'')}}" 
class="{{ $class??'form-control' }}" id="{{ $id??'' }}" data-default-file="{{ !empty($model)?$model->getFirstMediaUrl($nameImage??''):'' }}" 
placeholder="{{ TranslationHelper::translate(ucfirst($placeholder)??'') }}"  {{ $required ?? ''}}  {{ $accept??'' }}/>