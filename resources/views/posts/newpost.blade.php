<div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{url('/newpost')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                <div class="mb-3">
                    <label for="category_id">Categories</label>
                    <select name="category_id" id="category_id" class="form-select">
                        @foreach(App\Models\Category::all() as $cat)
                        <option value="{{$cat->id}}">{{$cat->category}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="post">Post</label>
                    <textarea name="post" id="post" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <a href="" data-dismiss="modal" class="btn btn-secondary">Back</a>
                <button class="btn btn-success float-end" type="submit" style="width: 100px">Post</button>
            </form>
        </div>
      </div>
    </div>
  </div>

