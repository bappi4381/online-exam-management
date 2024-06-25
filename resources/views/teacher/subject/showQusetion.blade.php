@extends('teacher.admin')

@section('content')
<section>
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="text-primary text-uppercase font-weight-bold py-3">Show Question Bank</h4>
            <a href="{{ route('generate.pdf') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Generate Pdf
            </a>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card px-5 py-5">
                    <form action="{{ route('question.search') }}" method="GET">
                        <div class="d-flex flex-column flex-md-row mb-3">
                            <input type="text" id="searchInput" name="search" class="form-control" placeholder="Search for names..">
                            <button type="submit" class="btn btn-primary ml-md-2 mt-2 mt-md-0">Search</button>
                        </div>
                    </form>
                    @if ($questions->isEmpty())
                        <p>No results found.</p>
                    @else
                        <ul>
                            @foreach ($questions as $question)
                                <div class="mb-4">
                                    <h5>{{ $loop->iteration }}. {{ $question->question }}</h5>
                                    <div class="d-flex">
                                        <p>A. {{ $question->A }}</p>
                                        <p class="px-5">B. {{ $question->B }}</p>
                                    </div>
                                    <div class="d-flex">
                                        <p>C. {{ $question->C }}</p>
                                        <p class="px-5">D. {{ $question->D }}</p>
                                    </div>
                                    <p>Ans: {{ $question->answer }}</p>
                                </div>
                            @endforeach
                            
                        </ul>
                        <div class="mt-4">
                            {{ $questions->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
       
    </div>
</section>
@endsection


