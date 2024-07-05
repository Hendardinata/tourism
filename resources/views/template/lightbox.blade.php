    <!-- Lightbox Services-->
    <div id="#lb-s" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="row">
            {{-- @foreach($data as $d) --}}
            <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>

            <div class="col-lg-8">

                <img class="img-fluid" src="{{asset('storage/image-destination/'.$data->image) }}" alt="alternative">
            </div> <!-- end of col -->
            <div class="col-lg-4">
                <h3>{{ $data->title }}</h3>
                <hr class="line-heading">
                <h6>Strategy Development</h6>
                <p>Need a solid foundation for your business growth plans? Aria will help you manage sales and meet your current needs</p>
                <p>By offering the best professional services and quality products in the market. Don't hesitate and get in touch with us.</p>
                <div class="testimonial-container">
                    <p class="testimonial-text">Need a solid foundation for your business growth plans? Aria will help you manage sales and meet your current requirements.</p>
                    <p class="testimonial-author">General Manager</p>
                </div>
                <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#projects">BACK</a>

            </div> <!-- end of col -->
            {{-- @endforeach --}}
        </div> <!-- end of row -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of lightbox -->
