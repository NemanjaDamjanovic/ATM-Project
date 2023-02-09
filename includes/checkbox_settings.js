<script>
function clearCheckboxes() {
  document.getElementById("denomination_5000").checked = false;
  document.getElementById("denomination_2000").checked = false;
  document.getElementById("denomination_1000").checked = false;
  document.getElementById("denomination_500").checked = false;
  document.getElementById("denomination_200").checked = false;
  
  event.target.checked = true;
}
</script>