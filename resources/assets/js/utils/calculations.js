import formattedDate from "./formattedDate";

// PS: pego do arquivo: 'app/Http/Models/IndiceTPR2010' e
//     'app/Http/Models/IndiceR50'
const MVs = ["4", "6", "10", "15"];
const MeVs = ["6", "9", "12", "16"];

const calculateSectionA = mv => {
  const d20d10 = +document.getElementById(`${mv}mv_d20-d10`).value;
  const input1 = +document.getElementById(`${mv}mv_input-1`).value;
  const input2 = +document.getElementById(`${mv}mv_input-2`).value;
  const input3 = +document.getElementById(`${mv}mv_input-3`).value;
  const input4 = +document.getElementById(`${mv}mv_input-4`).value;

  const tpr2010 = document.getElementById(`${mv}mv_tpr_20-10`);
  const output1 = document.getElementById(`${mv}mv_output-1`);
  const output2 = document.getElementById(`${mv}mv_output-2`);
  const result = document.getElementById(`${mv}mv_k_q-q0`);

  let tmp = 1.2661 * d20d10 - 0.0595;
  tpr2010.value = tmp;
  output1.value = tmp;

  tmp = (tmp - input2) / (input1 - input2) * (input3 - input4) + input4;
  if (!Number.isFinite(tmp) || Number.isNaN(tmp)) tmp = "";
  output2.value = tmp;
  result.value = tmp;
};

const calculateSectionB = mev => {
  const r50 = +document.getElementById(`${mev}mev_r50`).value;
  const input1 = +document.getElementById(`${mev}mev_input-1`).value;
  const input2 = +document.getElementById(`${mev}mev_input-2`).value;
  const input3 = +document.getElementById(`${mev}mev_input-3`).value;
  const input4 = +document.getElementById(`${mev}mev_input-4`).value;

  const output1 = document.getElementById(`${mev}mev_output-1`);
  const output2 = document.getElementById(`${mev}mev_output-2`);
  const result = document.getElementById(`${mev}mev_k_q-qint`);

  output1.value = r50;

  let tmp = (r50 - input2) / (input1 - input2) * (input3 - input4) + input4;
  if (!Number.isFinite(tmp) || Number.isNaN(tmp)) tmp = "";
  output2.value = tmp;
  result.value = tmp;
};

const calculateSectionC = () => {
  const inputs = {
    mmHg: +document.getElementById("input-mmHg").value,
    mbar: +document.getElementById("input-mbar").value
  };
  const outputs = {
    mbar: document.getElementById("output-mbar"),
    mmHg: document.getElementById("output-mmHg")
  };

  outputs.mbar.value = inputs.mmHg * 1.333224;
  outputs.mmHg.value = inputs.mbar / 1.333224;
};

const calculateSectionD = () => {
  let input1 = document.getElementById("60co_input-1").value;
  const input2 = +document.getElementById("60co_input-2").value;
  let input3 = document.getElementById("60co_input-3").value;

  const output1 = document.getElementById("60co_output-1");
  const output2 = document.getElementById("60co_output-2");
  const output3 = document.getElementById("60co_output-3");

  input1 = !input1 ? 0 : new Date(input1).getTime();
  input3 = !input3 ? 0 : new Date(input3).getTime();

  let tmp = (input3 - input1) / 1000 / 60 / 60 / 24;
  output1.value = input2 * Math.exp(-Math.log(2) * tmp / 1925.2);

  output2.value = formattedDate();

  const output2Value = new Date(output2.value).getTime();
  tmp = (output2Value - input1) / 1000 / 60 / 60 / 24;
  output3.value = input2 * Math.exp(-Math.log(2) * tmp / 1925.2);
};

export const calculateAllOutputs = () => {
  MVs.forEach(mv => {
    calculateSectionA(mv);
  });
  MeVs.forEach(mev => {
    calculateSectionB(mev);
  });
  calculateSectionC();
  calculateSectionD();
};

export const calculateOnBlur = e => {
  const { target, path } = e;
  const targetId = target.id;
  // path = [input, ..., section-X, ..., html, document, window];
  const sectionId = path[path.length - 9].id;

  switch (sectionId) {
    case "section-a":
      calculateSectionA(targetId.substr(0, targetId.indexOf("mv_")));
      break;
    case "section-b":
      calculateSectionB(targetId.substr(0, targetId.indexOf("mev_")));
      break;
    case "section-c":
      calculateSectionC();
      break;
    case "section-d":
      calculateSectionD();
      break;
    default:
      break;
  }
};
