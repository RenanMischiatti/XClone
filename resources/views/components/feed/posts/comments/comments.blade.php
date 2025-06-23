@foreach ($comments as $comment)
    <x-post :post="$comment" />
@endforeach