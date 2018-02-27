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
                <input id="{{$mv}}mv_d20-d10" name="{{$mv}}mv_d20-d10" 
                  type="number" step="any" class="validate experimental_data_color" 
                  placeholder="{{ $mode !== 'show' ? 'Insira dado...' : '' }}" 
                  value="{{ !!old($mv.'mv_d20-d10') ? old($mv.'mv_d20-d10') :
                    (isset($spreadsheet) ? 
                      $spreadsheet->indices_tpr2010[$loop->index]->d20_d10 : '') }}"
                  {{ $mode === 'show' ? 'disabled' : '' }}
                >
                <label for="{{$mv}}mv_d20-d10">D<sub>20</sub>/D<sub>10</sub></label>
              </div>
              <div class="input-field col s6">
                <input id="{{$mv}}mv_tpr_20-10" name="{{$mv}}mv_tpr_20-10" 
                  type="number" step="any" 
                  class="input_data_color" readonly
                >
                <label for="{{$mv}}mv_tpr_20-10">TPR<sub>20/10</sub></label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s4">
                <input id="{{$mv}}mv_input-1" name="{{$mv}}mv_input-1" 
                  type="number" step="any" class="validate table_data_color" 
                  placeholder="{{ $mode !== 'show' ? 'Insira dado...' : '' }}"
                  value="{{ !!old($mv.'mv_input-1') ? old($mv.'mv_input-1') :
                    (isset($spreadsheet) ? 
                      $spreadsheet->indices_tpr2010[$loop->index]->input_1 : '') }}"
                  {{ $mode === 'show' ? 'disabled' : '' }}
                >
              </div>
              <div class="input-field col s4">
                <input id="{{$mv}}mv_output-1" type="number" step="any" 
                  class="input_data_color" disabled
                >
              </div>
              <div class="input-field col s4">
                <input id="{{$mv}}mv_input-2" name="{{$mv}}mv_input-2" 
                  type="number" step="any" class="validate table_data_color" 
                  placeholder="{{ $mode !== 'show' ? 'Insira dado...' : '' }}"
                  value="{{ !!old($mv.'mv_input-2') ? old($mv.'mv_input-2') :
                    (isset($spreadsheet) ? 
                      $spreadsheet->indices_tpr2010[$loop->index]->input_2 : '') }}"
                  {{ $mode === 'show' ? 'disabled' : '' }}
                >
              </div>
            </div>
            <div class="row">
              <div class="input-field col s4">
                <input id="{{$mv}}mv_input-3" name="{{$mv}}mv_input-3" 
                  type="number" step="any" class="validate table_data_color" 
                  placeholder="{{ $mode !== 'show' ? 'Insira dado...' : '' }}"
                  value="{{ !!old($mv.'mv_input-3') ? old($mv.'mv_input-3') :
                    (isset($spreadsheet) ? 
                      $spreadsheet->indices_tpr2010[$loop->index]->input_3 : '') }}"
                  {{ $mode === 'show' ? 'disabled' : '' }}
                >
              </div>
              <div class="input-field col s4">
                <input id="{{$mv}}mv_output-2" type="text" class="output_data_color" disabled>
              </div>
              <div class="input-field col s4">
                <input id="{{$mv}}mv_input-4" name="{{$mv}}mv_input-4" 
                  type="number" step="any" class="validate table_data_color" 
                  placeholder="{{ $mode !== 'show' ? 'Insira dado...' : '' }}"
                  value="{{ !!old($mv.'mv_input-4') ? old($mv.'mv_input-4') :
                    (isset($spreadsheet) ? 
                      $spreadsheet->indices_tpr2010[$loop->index]->input_4 : '') }}"
                  {{ $mode === 'show' ? 'disabled' : '' }}
                >
              </div>
            </div>
            <div class="row">
              <div class="col s12 center">
                <strong>k<sub>Q,Q0</sub> =</strong> 
                <div class="input-field inline">
                  <input id="{{$mv}}mv_k_q-q0" name="{{$mv}}mv_k_q-q0" 
                    type="text" class="output_data_color" readonly
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</section>
