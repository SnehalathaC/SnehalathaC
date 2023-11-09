const endStep = <?php echo $value;?>; // Update this value to set the end step

const stepItems = document.querySelectorAll('.step-item');
const stepLines = document.querySelectorAll('.step-line');

stepItems.forEach((item, index) => {
  if (index < endStep) {
    item.classList.add('completed');
  }
});

stepLines.forEach((line, index) => {
  if (index < endStep - 1) {
    line.classList.add('completed');
  }
});