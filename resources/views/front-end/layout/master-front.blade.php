<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Auction | @yield('title')</title>
  <link rel="stylesheet" href="{{url('/public/css/bulma.css')}}">
  <link rel="stylesheet" href="{{url('/public/css/front_end_style.css')}}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
</head>
<body>
  <div id="app">
    <section class=" bgColor">
      <header>
        <nav class="navbar is-fixed-top" role="navigation" aria-label="main navigation">
          <div class="navbar-brand">
            <a class="navbar-item" href="https://bulma.io">
              <img src="{{url('/public/image/ccsa_logo.jpg')}}" width="112" height="28">
            </a>

            <a role="button" v-bind:class="[showMenu ? 'navbar-burger burger is-active':'navbar-burger burger'] " @click="showHiddenMenu()" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
              <span aria-hidden="true"></span>
              <span aria-hidden="true"></span>
              <span aria-hidden="true"></span>
            </a>
          </div>

          <div id="navbarBasicExample" :class="[showMenu ? 'navbar-menu is-active':'navbar-menu ']">
            <div class="navbar-start">
              <a class="navbar-item" href="{{url('/')}}">
                Home
              </a>

              <a class="navbar-item" href="{{url('/news')}}">
                News
              </a>
              <a class="navbar-item" href="{{url('/about')}}">
                About
              </a>
              <a class="navbar-item" href="{{url('/contact')}}">
                Contact
              </a>


            </div>

            <div class="navbar-end">
              <div class="navbar-item has-dropdown is-hoverable" id="customCss">
                <div class="field is-grouped">
                  <p class="control is-expanded">
                    <input class="input" ref="search_input" @keyup="searchItem()" type="text" placeholder="Find an auction items">
                    <input type="hidden" ref="baseUrl" name="baseUrl" value="{{url('')}}">
                  </p>
                  <p class="control">
                    <a class="button is-info">
                      Search
                    </a>
                  </p>
                </div>
                <div class="navbar-dropdown">
                  <div class="box">
                    <ul class="customList">
                      <li v-for="(item,index) in auction_items" class="title is-5 is-primary" :key="index">

                        <a :href="baseUrl+'/item-detail/'+item.id">
                          @{{item.short_desciption.substr(0,20)}}
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="navbar-item">
                @guest
                  <div class="buttons">
                    <a class="button is-primary" href="{{ route('register') }}">
                      <strong>Sign up</strong>
                    </a>
                    <a class="button is-light" href="{{ route('login') }}">
                      Sign in
                    </a>
                  </div>
                @else
                  <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                      {{-- <figure class="image is-64*64">
                      <img src="https://bulma.io/images/placeholders/128x128.png">
                    </figure> --}}
                    {{ Auth::user()->name }}
                    <i class="fas fa-user"></i>
                  </a>

                  <div class="navbar-dropdown">
                    <a class="navbar-item" href="{{ route('login') }}">
                      Sign in
                    </a>
                    <a class="navbar-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    sign out
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>

                </div>
              </div>
            @endguest

          </div>

        </div>
      </div>
    </nav>
      </header>
    </section>


    <section class=" bgColor">
      @yield('content')
    </section>


    <section class=" bgColor">
      <footer class="footer bgColor">
        <div class="content">
          <p class="textWhite">
            Coach's Corner Sports Auctions LLC - 47 N. Front Street, Souderton, PA 18964 (215) 721-9162, Fax (215) 721-7255 - E-mail: contact@myccsa.com
            Copyright © Coach's Corner Sports Auctions LLC. All rights reserved. Privacy Policy | Terms and Conditions
          </p>
        </div>
      </footer>
    </section>

  </div>
  {{-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=ayn49ntzgcmzv4p8sz6zy5rjo2v1150mxjdbqfpwklnkm5xe"></script> --}}
  <script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
  <script type="text/javascript" src="{{asset('/public/js/vue.js')}}"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>
  <script type="text/javascript">
  var app1 = new Vue({
    el:'#app',
    data:{
      showMenu:false,
      auction_items:[],
      baseUrl:'',
    },
    methods:{
      showHiddenMenu(){
        this.showMenu = ! this.showMenu;
      },
      searchItem(){
        // console.log(this.$refs.search_input.value);
        var value = this.$refs.search_input.value;
        this.baseUrl = this.$refs.baseUrl.value;
        axios.post(this.baseUrl+'/search-items',{short_desciption:value.trim()})
        .then((res)=>{
          // console.log(res.data);
          // this.auction_items.push(res.data);
          this.auction_items = res.data;
        })
        .catch((error)=>{
          console.log(error.response);
        });
      }
    }
  });

  </script>
  <script>
			CKEDITOR.replace( 'editor1' );


		</script>
</body>
</html>
