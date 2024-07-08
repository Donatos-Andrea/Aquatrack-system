document.addEventListener('DOMContentLoaded', function() {
  const table = document.getElementById('payment-table');

  table.addEventListener('click', function(event) {
    const target = event.target;
    console.log('Clicked:', target);
    
    if (target.classList.contains('edit-btn')) {
      console.log('Edit button clicked');
      handleEdit(target);
    } else if (target.classList.contains('save-btn')) {
      console.log('Save button clicked');
      handleSave(target);
    }
  });
});

function handleEdit(btn) {
  const row = btn.closest('tr');
  const cells = row.cells;

  for (let i = 1; i < cells.length - 1; i++) {
    const cell = cells[i];
    if (cell.querySelector('input')) continue;

    const value = cell.innerText;
    cell.innerHTML = `<input type="text" value="${value}">`;
  }

  row.querySelector('.save-btn').style.display = 'inline-block';
  row.querySelector('.edit-btn').style.display = 'none';
}

function handleSave(btn) {
  const row = btn.closest('tr');
  const cells = row.cells;
  const payment_id = row.cells[0].innerText;
  const date_of_payment = cells[1].querySelector('input').value;

  // Send data to the server using fetch API
  fetch('payment.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded',
    },
    body: `action=update&payment_id=${payment_id}&date_of_payment=${encodeURIComponent(date_of_payment)}`,
  })
  .then(response => response.text())
  .then(data => {
    console.log(data); // Log server response
    cells[1].innerText = date_of_payment; // Update cell with new value
    row.querySelector('.edit-btn').style.display = 'inline-block';
    row.querySelector('.save-btn').style.display = 'none';
  })
  .catch(error => console.error('Error:', error));
}
