{{-- <div style="display: none">
    <textarea class="form-control description" id="description[en]" value="" name="{{'description'}}"/></textarea>
    <textarea class="form-control description" id="description[ar]" value="" name="{{'description'}}"/></textarea>
    <textarea class="form-control sub_description" id="sub_description[en]" value="" name="{{'sub_description'}}"/></textarea>
    <textarea class="form-control sub_description" id="sub_description[ar]" value="" name="{{'sub_description'}}"/></textarea>
</div> --}}
<script>
CKEDITOR.replace('description[en]', {
    height: 300,
    filebrowserUploadUrl: "{{Route('upload.image',['_token'=>csrf_token()])}}"
, });
</script>
<script>
CKEDITOR.replace('description[ar]', {
    height: 300,
    filebrowserUploadUrl: "{{Route('upload.image',['_token'=>csrf_token()])}}"
, });
</script>



<script>
CKEDITOR.replace('sub_description[en]', {
    height: 300,
    filebrowserUploadUrl: "{{Route('upload.image',['_token'=>csrf_token()])}}"
, });
</script>
<script>
CKEDITOR.replace('sub_description[ar]', {
    height: 300,
    filebrowserUploadUrl: "{{Route('upload.image',['_token'=>csrf_token()])}}"
, });
</script>