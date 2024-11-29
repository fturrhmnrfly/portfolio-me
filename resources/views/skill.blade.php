<x-layout>
    @foreach ( $skills as $skill )
        {{ $skill->title }}
        {{ $skill->description }}
    @endforeach
</x-layout>