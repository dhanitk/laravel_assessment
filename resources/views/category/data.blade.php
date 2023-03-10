<div class="card-body">
  <div class="float-end">
    <form action="{{ url('category') }}" class="row g-2" method="GET">
      <div class="col-auto">
        <input type="text" class="form-control" id="keywords" name="keywords" placeholder="Search...">
      </div>
      <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3"><i class="fa-solid fa-magnifying-glass"></i></button>
      </div>
    </form>
  </div>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col" style="width: 5%;">No</th>
            <th scope="col">Name</th>
            <th scope="col" style="width: 10%">Publish</th>
            <th scope="col" class="text-center" style="width: 20%">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($category as $key => $value)    
            <tr>
              <th scope="row" >{{ $category->firstItem() + $key }}</th>
              <td>{{ $value->name }}</td>
              <td>{{ $value->is_publish }}</td>
              <td class="text-center">
                  <a href="{{ url('category/edit/' . $value->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-pen-to-square"></i></a>
                  <form action="{{ url('category/' . $value->id) }}" class="d-inline" method="POST" onsubmit="return confirm('Yakin menghapus data ini?')">
                    @method('delete')
                    @csrf
                      <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                  </form>
              </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      <div class="float-start">
        Showing
        {{ $category->firstItem() }}
        to
        {{ $category->lastItem() }}
        of
        {{ $category->total() }}
        entries.
      </div>
      <div class="float-end">
          {{ $category->links() }}
      </div>
</div>