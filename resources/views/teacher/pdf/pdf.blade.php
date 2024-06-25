<!DOCTYPE html>
<html>
<head>
    <title>Questions PDF</title>
    <style>
        .mb-4 { margin-bottom: 1.5rem; }
        .d-flex { display: flex; }
        .px-5 { padding-left: 3rem; padding-right: 3rem; }
        h5 { margin-bottom: 0.5rem; }
    </style>
</head>
<body>
    <h1>Questions Bank</h1>
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
</body>
</html>