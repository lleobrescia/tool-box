<?php
/**
 * Template part for displaying newsletter form
 *
 *
 * @package Tool_Box
 */

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type='text/javascript'
  src="https://d335luupugsy2.cloudfront.net/js/integration/stable/rd-js-integration.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
  var form = jQuery('#conversion-form');
  var inputUf = form.find('select[name="uf"]');
  var inputEmail = form.find('input[name="email"]');
  var inputToken = form.find('input[name="token_rdstation"]');
  var inputIdentificador = form.find('input[name="identificador"]');
  form.on('submit', function(ev) {
    ev.preventDefault();
    var data_array = [{
        name: 'uf',
        value: inputUf.val()
      },
      {
        name: 'email',
        value: inputEmail.val()
      },
      {
        name: 'token_rdstation',
        value: inputToken.val()
      },
      {
        name: 'identificador',
        value: inputIdentificador.val()
      },
    ];
    RdIntegration.post(data_array, function() {
      jQuery("#newsletter-alert").css('display', 'block');
    });
  });
});
</script>
<section class="newsletter">
  <div class="container">

    <div class="row">
      <div class="col-12">
        <h2 class="newsletter__title">
          INSCREVA-SE
          <span>para ter acesso exclusivo a</span>
        </h2>
      </div> <!-- col-12 -->
    </div> <!-- row -->

    <div class="row newsletter__info">
      <div class="col-12 text-center">
        <h3 class="float-xl-right newsletter__sub-title">
        <span>para ter acesso exclusivo a</span> descontos na loja <strong>+</strong> e-books exclusivos e gratuitos <br>
          <strong>+</strong> promoções e vantagens
        </h3>
      </div> <!-- col-12 -->
    </div> <!-- newsletter__info -->

    <div class="row">
      <div class="col-12">
        <form id="conversion-form" class="form-inline newsletter__form">
          <input type="hidden" id="token_rdstation" name="token_rdstation" value="b52acdf4ad18d87052b84abab7d7afae">

          <input type="hidden" id="identificador" name="identificador" value="newsletter-44868c810a">
          <div class="form-group form-group--cidade">
            <select name="uf" id="uf" required class=" form-control form-control-lg">
              <option value="">estado</option>
              <option value="AC">AC</option>
              <option value="AL">AL</option>
              <option value="AP">AP</option>
              <option value="AM">AM</option>
              <option value="BA">BA</option>
              <option value="CE">CE</option>
              <option value="DF">DF</option>
              <option value="ES">ES</option>
              <option value="GO">GO</option>
              <option value="MA">MA</option>
              <option value="MT">MT</option>
              <option value="MS">MS</option>
              <option value="MG">MG</option>
              <option value="PA">PA</option>
              <option value="PB">PB</option>
              <option value="PR">PR</option>
              <option value="PE">PE</option>
              <option value="PI">PI</option>
              <option value="RJ">RJ</option>
              <option value="RN">RN</option>
              <option value="RS">RS</option>
              <option value="RO">RO</option>
              <option value="RR">RR</option>
              <option value="SC">SC</option>
              <option value="SP">SP</option>
              <option value="SE">SE</option>
              <option value="TO">TO</option>
            </select>
          </div>
          <div class="form-group form-group--email">
            <input type="email" name="email" class="form-control form-control-lg" placeholder="e-mail" required>
          </div>
          <button type="submit" class="btn btn-primary">
            Cadastrar <br> gratuitamente
          </button>
        </form>
        <div id="newsletter-alert" class="alert alert-success" role="alert"
          style="margin-top: 10px;max-width: 300px;margin-left: auto; display:none">
          E-mail cadastrado com sucesso!
        </div>
      </div> <!-- col-12 -->
    </div> <!-- row -->

  </div> <!-- container -->
</section> <!-- newsletter -->
