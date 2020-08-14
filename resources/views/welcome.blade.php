<x-shell>
    @foreach(\App\Meetup::all() as $meetup)
        <div class="mt-8">
            {{ $meetup->name }}
        </div>
    @endforeach
</x-shell>
