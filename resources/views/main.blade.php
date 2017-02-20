<!DOCTYPE html>
<html lang="en">

  @include('partials._head')

  <body id='myPage'>

    @include('partials._nav')

    <div class="container">

      @include('partials._message')

      {{ Auth::check() ? 'Logged In' : 'Logged Out' }}

      @yield('content')

      @include('partials._foot')

    </div>

    @include('partials._js')

  </body>
</html>
