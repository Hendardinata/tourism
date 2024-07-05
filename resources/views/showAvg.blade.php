<h4 class="pt-2">Ratings</h4>
<p>Rata-rata Rating: {{ isset($averageRating) ? number_format($averageRating, 2) : 'Data tidak tersedia' }}</p>
<ul class="list-unstyled">
    @forelse($destination->ratings as $rating)
        <li>
            <strong>Rating: </strong> {{ $rating->rating }}<br>
            <strong>Review: </strong> {{ $rating->review }}
        </li>
    @empty
        <li>Belum ada rating.</li>
    @endforelse
</ul>
