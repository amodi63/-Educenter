
    <div class="card p-0 border-primary rounded-0 hover-shadow">
      <img class="card-img-top rounded-0" src="{{ asset('uploads/courses/' . $item->image) }}" alt="course thumb">
      <div class="card-body">
        <ul class="list-inline mb-2">
          <li class="list-inline-item"><i class="ti-calendar mr-1 text-color"></i>02-14-2018</li>
          <li class="list-inline-item"><a class="text-color" href="course-single.html">Humanities</a></li>
        </ul>
        <a href="course-single.html">
          <h4 class="card-title">{{ $item->title }}</h4>
        </a>
        <p class="card-text mb-4"> {{ $item->description }} </p>
        <a href="{{ route('site.course')}}" class="btn btn-primary btn-sm">{{ $item->btn_text}}</a>
      </div>
    </div>
  </div>

  {{-- <div class="card">
    <img class="card-img-top" src="{{ asset('uploads/courses/' . $item->image) }}" alt="Card image cap">
    <div class="card-body">
      <h4 class="card-title">{{ $item->title }}</h4>
      <p class="card-text">
        {{ $item->description }}
      </p>
      <a href="{{ route('site.course')}}" class="btn btn-success">Go somewhere</a>
    </div>
  </div> --}}

