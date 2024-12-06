<x-app-layout>
    
    <h1 class="text-5xl mb-10 text-center">All available charity</h1>
    <div class="row justify-center mb-10">
      <div class="col-md-6">
        <form action="/listing">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search . ." name="search" value="{{request('search')}}">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    @if ($listing->count())
    @foreach ($listing as $list)
    <div class="card mb-3">
        <img src="/img/{{$list->img_url}}" class="card-img-top max-h-80" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{$list->name}}</h5>
          <p class="card-text">{{$list->excerpt}}</p>
          <p class="card-text"><small class="text-body-secondary">{{$list->publishing_date}}</small></p>
          <a href="/listing/{{$list->slug}}" class="underline hover:text-cyan-400">Read More</a>
        </div>
    </div>
    @endforeach
    @else
      <h1 class="text-center text-5xl text-gray-500">No results</h1>
    @endif

    <div class="pb-3">
      {{$listing->links()}}
    </div>
</x-app-layout>