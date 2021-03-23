     @if(session()->has('success'))
            <div class="alert alert-success">
                     {{ session()->get('success')}}
                     {{ session()->get('delete')}}
                     {{ session()->get('update')}}
            </div>
    @endif

    @if(session()->has('delete'))
            <div class="alert alert-danger">
                     {{ session()->get('success')}}
                     {{ session()->get('delete')}}
                     {{ session()->get('update')}}
            </div>
    @endif

     @if(session()->has('update'))
            <div class="alert alert-primary">
                     {{ session()->get('success')}}
                     {{ session()->get('delete')}}
                     {{ session()->get('update')}}
            </div>
    @endif
