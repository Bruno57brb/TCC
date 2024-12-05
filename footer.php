<style>
  footer {
    background-color: #4caf50;
    padding: 40px 0px;
    color: white;
    text-align: center;
    font-size: 14px;
    position: relative;
  }

  .iff {
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.4);
    position: absolute;
    bottom: 33%;
    right: 70px;
    transform: translateY(-50%);
    width: 160px;
    height: 160px;
    background-color: white;
    border: 5px solid #006f3c;
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    transform: rotate(45deg);
    z-index: 2;
    padding: 20px;
  }

  .iff img {
    transform: rotate(-45deg);
    width: 80px;
    height: auto;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) rotate(-45deg);
  }

  /* Ajuste de tamanho para telas menores */
  @media (max-width: 768px) {
    .iff {
      width: 120px;
      height: 120px;
    }

    .iff img {
      width: 60px;
    }
  }

  @media (max-width: 480px) {
    .iff {
      width: 80px;
      height: 80px;
    }

    .iff img {
      width: 40px;
    }
  }
</style>

<footer>
  <div class="iff">
    <img src="img/iff.jpg" alt="logo">
  </div>
  © 2024 Instituto Federal <br>
  Numero pra contato: 55996507010 <br>  
  Desenvolvedor: Bruno 


</footer>
 