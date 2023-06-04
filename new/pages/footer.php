<style>
    footer{
        width: 100%;
        height: 300px;
        padding-top: 20px;
        border-radius: 15px;
        display: flex;
        justify-content: space-around;
        background-image: linear-gradient(to right ,#ad7949,#c89c6b);
    }
    footer section i{
        border-radius: 45%;        
        width: 40px;
        height: 40px;
        text-align:center;
        line-height: 40px;
        font-size:1.2rem;
        cursor:pointer;
    }
    footer ul{
        padding:0;
    }
    footer section ul li{
        list-style: none;
        margin-top:1em;   
        display:flex;
        justify-content: space-between;
        align-items:center;
    }
    footer ul li a{
        text-decoration: none;
        color: rgb(235, 216, 183);
    }
    .bi-map:hover, .bi-phone:hover, .bi-envelope:hover{
        color: rgb(235, 216, 183);
    }
    .footerIcon{
        display:grid;
        grid-template-columns: auto auto auto;
    }
    @media screen and (max-width: 60em){
        footer{
            height:200px;
        }
        footer > *{
            font-size:0.5rem!important;
        }
        footer i{
            width:20px!important;
            height:20px!important;
            line-height:20px!important;
        }
        .footerIcon{
            grid-template-columns:auto auto;
            margin:0 auto;
        }
    }
</style>    
    <footer>
        <section>
            <p>Connect  With Us</p>
            <section class="footerIcon">
                <i class="bi bi-facebook"></i>
                <i class="bi bi-twitter"></i>
                <i class="bi bi-instagram"></i>
                <i class="bi bi-linkedin"></i>
                <i class="bi bi-youtube"></i>
                <i class="bi bi-pinterest"></i>
            </section>
        </section>
        <section>
          <p>HOW TO BUY</p>
          <ul>
            <li><a href="#">online maike</a></li>
            <li><a href="#">Consipt</a></li>
            <li><a href="#">making payments</a></li>
            <li><a href="#">buyer protection</a></li>
            <li><a href="#">new user guids</a></li>
          </ul>
        </section>
        <section>
          <p>COSTUMER SERVICES</p>
            <ul>
                <li><a href="#">online services</a></li>
                <li><a href="#">sucure</a></li>
                <li><a href="#">Reponsiable</a></li>
                <li><a href="#">Refond</a></li>
                <li><a href="#">nes -us</a></li>
            </ul>
      </section>
      <section>
        <p>CONTACT US</p>
        <ul>
          <li><i class="bi bi-map"></i><a href="#">Duhok _ Azade-City</a></li>
          <li><i class="bi bi-phone"></i><a href="#">+964 000 000 0000</a></li>
          <li><i class="bi bi-envelope"></i><a href="#">TeaShop@emali.com</a></li>
        </ul>
      </section>
      </footer>
