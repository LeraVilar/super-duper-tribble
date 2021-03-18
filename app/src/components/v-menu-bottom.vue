 <template>

    <div class="v-menu-bottom" id="nav"> 
        <div class="v-menu-bottom__items">

            <router-link :to="{name: 'cat'}">
            <div class="v-menu-bottom__back-to-catalog">
                <i class="material-icons catalog">expand_more</i>
                <span>Каталог</span>
            </div>
            </router-link>

            <router-link :to="{name: 'cart', params: {cart_data: CART}}">
            <div class="v-menu-bottom__cart">
                <div class="v-menu-bottom__value">{{CART.length}}</div>
                <i class="material-icons" id="cart">add_shopping_cart</i>
            </div>
            </router-link>
            <div class="v-menu-bottom__login">
                <router-link v-if="!isLoggedIn" to="/register" class="v-menu-bottom__register">Регистрация</router-link>
                <router-link v-if="!isLoggedIn" to="/login" class="v-menu-bottom__enter">Войти</router-link>
                <router-link v-if="isLoggedIn" to="/secure">Личный кабинет</router-link>
                <span v-if="isLoggedIn"> | <a @click="logout">Logout</a></span>
            </div>
            <div class="v-menu-bottom__search" data-step="a" >
                <input type="text" class="search" v-model="searchValue">
                <i class="material-icons" id="search" @click="search(searchValue)">search</i>
            </div>
        </div>
    </div>

</template>
<script>
import $ from 'jquery';
import {mapGetters, mapActions} from 'vuex'


export default {
    name: 'v-menu-bottom',
    components: {
    },
    computed:{
        ...mapGetters([
            'CART',
            'SEARCH_VALUE',

        ]),
        isLoggedIn : function(){ 
            return this.$store.getters.isLoggedIn
        },
        category() {
            return this.$store.getters.CATEGORY
        }
    },
    methods: {
        ...mapActions([
           'GET_SEARCH'
        ]),
      logout: function () {
        this.$store.dispatch('logout')
        .then(() => {
          this.$router.push('/login')
        })
      },
      search(value) {
          this.GET_SEARCH(value);
          this.searchValue = '';
          if (this.$route.path != '/catalog') {
              return this.$router.push('/catalog')
          }
      },
      filtredCategory(id) {
          console.log(id)
      }
    },
    mounted() {
        $(function (f) {
    f(window).scroll(function () {
        f('#nav')[
            (f(this).scrollTop() > 55 ? "add" : "remove") + "Class"
            ]("bar_fixed");
    });
});
    },
    data () {
        return {
            searchValue: '',
            selected: "Каталог"
        }
    }
}

</script>
<style lang="scss" scoped>
    #cart {
        font-size: 36px;
        color: #ffffff;
    }
    #search {
        font-size: 36px;
        color: #ffffff;
        cursor: pointer;
    }
    .v-menu-bottom {
        max-width: 100%;
        height: 75px;
        background:#064717;
        &__value {
            position: absolute;
            margin: -10px 25px;
            border-radius: 50%;
            width: 20px;
            height: 22px;
            text-align: center;
            font-weight: 900;
            color: #FFFFFF;
            background: red;
        }
        
        &__items {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            height: 100%;
            max-width: 1440px;
            margin: 0 auto;
         }
        &__back-to-catalog {
            display: flex;
            align-items: center;
            font-size: 26px;
            font-weight: 600;
            color: #FFF;
            & .catalog {
                transition: .5s;
                
            }
            &:hover .catalog {
                transition: .5s;
                -webkit-transform: rotate(180deg); 
                -ms-transform: rotate(180deg);
                transform: rotate(180deg);
            }
        }
        &__search {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 50px;
            .search {
                margin: 0 18px;
                width: 300px;
                height: 40px;
                background: #FFF;
                border: none;
                font-size: 24px;
                padding: 5px;
                border-radius: 15px;
            }
         }

        &__register {
            margin: 0 16px;
         }

        &__login {
            & a {
                color: #FFF;
                
            }
            display: flex;
            color: #FFF;
            font-size: 26px;
         }
}

.bar_fixed {
    top: 0;
    position: sticky;
    z-index: 2;
}

// Catalog menu styles

nav {
  text-align: center;
}
nav a {
  text-decoration: none;
  display: block;
  transition: .3s linear;
}
nav ul {
  list-style: none;
  margin: 0;
  padding: 0;
}
.topmenu > li {
  display: inline-block;
  position: relative;
  margin-right: -4px;

}
.topmenu > li > a {
  font-weight: bold;
  padding: 20px 30px;
  font-size: 12px;
  text-transform: uppercase;
  letter-spacing: 2px;
  color:#FFF;
}
.active:after, .submenu-link:after {
  content: "";
  font-family: "FontAwesome";

  margin-left: 10px;
}
.topmenu > li > a:hover, .submenu li a:hover {color: #FFF; background: rgb(62, 136, 91);}
.submenu {
  position: absolute;
  left: -1px;
  z-index: 5;
  width: 240px;
  visibility: hidden;
  opacity: 0;  
  transform: translateY(10px);
  transition: .3s ease-in-out;
}
.submenu li {position: relative;}
.submenu a {
  background:#064717;
  color: #FFF;
  text-align: left;
  font-size: 14px;
  letter-spacing: 1px;
  padding: 10px 20px;
}
.submenu .submenu {
  position: absolute;
  top: 0;
  left: calc(100% - 1px);
  left: -webkit-calc(100% - 1px);
}
nav li:hover > .submenu {
  visibility: visible;
  opacity: 1;
  transform: translateY(0px);
}
</style>