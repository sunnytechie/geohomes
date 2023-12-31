<div class="col-sm-6 text-left text-sm-right">
    <span class="d-inline-block text-heading font-weight-500 lh-17 mr-1">Share this post</span>
    <ul>
      <li class="list-inline-item">
          <form action="{{ route('share.twitter') }}" method="post" target="_blank">
            @csrf
            <input type="hidden" name="url" value="{{ $pamaLink }}">
            <button type="submit" class="text-muted fs-15 hover-dark lh-1 px-2" style="border: none; padding: 10px"><i class="fab fa-twitter"></i></button>
          </form>
        </li>
        
        <li class="list-inline-item">
          <form action="{{ route('share.facebook') }}" method="post" target="_blank">
            @csrf
            <input type="hidden" name="url" value="{{ $pamaLink }}">
            <button type="submit" class="text-muted fs-15 hover-dark lh-1 px-2" style="border: none; padding: 10px"><i class="fab fa-facebook-f"></i></button>
          </form>
        </li>
        
        <li class="list-inline-item">
          <form action="{{ route('share.whatsapp') }}" method="post" target="_blank">
            @csrf
            <input type="hidden" name="url" value="{{ $pamaLink }}">
            <button type="submit" class="text-muted fs-15 hover-dark lh-1 px-2" style="border: none; padding: 10px"><i class="fab fa-whatsapp"></i></button>
          </form>
        </li>
        
    </ul>
</div>