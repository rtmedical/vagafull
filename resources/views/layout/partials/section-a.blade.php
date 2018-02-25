<!-- Índice de Qualidade - TPR<sub>20/10</sub> -->
<section id="section-a" class="section">
  <h5 class="header center teal-text text-lighten-2">Índice de Qualidade - TPR<sub>20/10</sub></h5>
  <div class="row">
    @foreach($mvs as $mv)
      <div class="col s12 l6">
        <div class="card hoverable">
          <div class="card-content">
            <span class="card-title center"><h5>{{ $mv }} MV</h5></span>
            <div class="row">
              <div class="input-field col s6">
                <input id="{{$mv}}mv_d20-d10" name="{{$mv}}mv_d20-d10" type="number" class="validate experimental_data_color" value="0.00">
                <label for="{{$mv}}mv_d20-d10">D<sub>20</sub>/D<sub>10</sub></label>
              </div>
              <div class="input-field col s6">
                <input id="{{$mv}}mv_tpr_20-10" type="number" class="input_data_color" disabled value="0.00">
                <label for="{{$mv}}mv_tpr_20-10">TPR<sub>20/10</sub></label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s4">
                <input id="{{$mv}}mv_input-1" name="{{$mv}}mv_input-1" type="number" class="validate table_data_color" value="0.00">
              </div>
              <div class="input-field col s4">
                <input id="{{$mv}}mv_input-d-1" type="number" class="input_data_color" disabled value="0.00">
              </div>
              <div class="input-field col s4">
                <input id="{{$mv}}mv_input-2" name="{{$mv}}mv_input-2" type="number" class="validate table_data_color" value="0.00">
              </div>
            </div>
            <div class="row">
              <div class="input-field col s4">
                <input id="{{$mv}}mv_input-3" name="{{$mv}}mv_input-3" type="number" class="validate table_data_color" value="0.00">
              </div>
              <div class="input-field col s4">
                <input id="{{$mv}}mv_input-d-2" type="number" class="output_data_color" disabled value="0.00">
              </div>
              <div class="input-field col s4">
                <input id="{{$mv}}mv_input-4" name="{{$mv}}mv_input-4" type="number" class="validate table_data_color" value="0.00">
              </div>
            </div>
            <div class="row">
              <div class="col s12 center">
                <strong>k<sub>Q,Q0</sub> =</strong> 
                <div class="input-field inline">
                  <input id="{{$mv}}mv_result" type="number" class="output_data_color" disabled  value="0.00">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</section>
