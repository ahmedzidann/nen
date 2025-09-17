<tr id="row{{$length}}">
    <td>{{ $length-1  }}</td>
    <td><select class="form-control" name="country[]">
            @foreach ($countries as $row)
            <option value="{{$row->id}}">{{$row->title }}</option>
            @endforeach

        </select></td>
    <td> <input type="url" name="url[]" class="form-control" /></td>
    <td> <button type="button" onclick="delete_row({{$length}})"
            class="btn btn-danger">
            <i class="bx bxs-trash"></i>&nbsp;</button></td>


</tr>