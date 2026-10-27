<article class="story-card" data-tilt-card>
    <a class="story-card-link" href="{{ url('/'.ltrim($story->uri, '/')) }}">
        <div class="book-stage book-stage-card">
            <div class="book-3d" data-tilt>
                <span class="book-pages" aria-hidden="true"></span>
                <span class="book-spine" aria-hidden="true"></span>
                <span class="book-cover">
                    <img src="{{ $story->image_url }}" alt="Sampul cerita {{ $story->title }}" loading="lazy">
                    <span class="cover-shade" aria-hidden="true"></span>
                </span>
            </div>
            <span class="book-shadow" aria-hidden="true"></span>
        </div>
        <div class="story-card-copy">
            <span class="eyebrow">{{ ucfirst($story->tag) }}</span>
            <h3>{{ $story->title }}</h3>
            <span class="read-link">Buka cerita <span aria-hidden="true">↗</span></span>
        </div>
    </a>
</article>
