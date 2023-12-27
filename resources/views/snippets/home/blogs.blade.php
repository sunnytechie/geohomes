<section class="bg-gray-02 pt-10 pb-10">
    <div class="container">
      <p class="text-primary letter-spacing-263 text-uppercase lh-186 text-center mb-0">new & articles</p>
      <h2 class="text-center lh-1625 text-dark pb-1">
        Check Out Recent News & Articles
      </h2>
      <div class="mx-n2">
        <div class="slick-slider mt-6 mx-n1 slick-dots-mt-0"
             data-slick-options='{"slidesToShow": 3, "autoplay":false,"arrows":false,"dots":true,"infinite": true,"responsive":[{"breakpoint": 992,"settings": {"slidesToShow":2}},{"breakpoint": 768,"settings": {"slidesToShow": 2,"autoplay":true}},{"breakpoint": 576,"settings": {"slidesToShow": 1,"arrows":false,"dots":true,"autoplay":true}}]}'>

            @foreach ($posts as $post)
            <div class="item py-4" data-animate="fadeInUp">
                <div class="card border-0 shadow-xxs-3">
                <div class="position-relative d-flex align-items-end card-img-top">
                    <a href="{{ route('blog.show', $post->id) }}" class="hover-shine">
                    <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}">
                    </a>
                    <a href="{{ route('blog.show', $post->id) }}" class="badge pos-fixed-bottom text-white bg-dark-opacity-04 fs-13 font-weight-500 bg-hover-primary hover-white mx-2 my-4 position-absolute">
                    {{ $post->category->title }}
                    </a>
                </div>
                <div class="card-body px-5 pt-3 pb-5
                    <p class="mb-1 fs-13">{{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</p>
                    <h3 class="fs-18 text-heading lh-194 mb-1">
                    <a href="{{ route('blog.show', $post->id) }}" class="text-heading hover-primary">{!! Str::limit($post->title, 45) !!}</a>
                    </h3>
                    <p class="mb-3">{!! Str::limit($post->body, 50) !!}</p>
                    <a class="text-heading font-weight-500" href="{{ route('blog.show', $post->id) }}">Learn more <i
                                    class="far fa-long-arrow-right text-primary ml-1"></i></a>
                </div>
                </div>
            </div>
            @endforeach

        </div>
      </div>
    </div>
  </section>
