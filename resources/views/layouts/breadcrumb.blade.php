<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6"><h1>{{ $breadcrumb->title }}</h1></div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          @foreach($breadcrumb->list as $key => $value)
            @if($key == count($breadcrumb->list)->list - 1)
=======
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6"><h1>{{ $breadcrumb->title }}</h1></div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            @foreach ($breadcrumb->list as $key => $value)
            @if ($key == count($breadcrumb->list)-1) {{-- Perbaikan: $breadcrum menjadi $breadcrumb --}}
              <li class="breadcrumb-item active">{{ $value }}</li>
            @else
              <li class="breadcrumb-item">{{ $value }}</li>
            @endif
          @endforeach
            </ol>
          </div>
        </div>
      </div>
    </section>
=======
            @endforeach
          </ol>
        </div>
      </div>
    </div></section>
>>>>>>> bbbdf75dbee98c6caf22b4d26dd36149b9e50e50
