document.addEventListener('DOMContentLoaded', function() {
  const table = document.getElementById('products-table');
  const addBtn = document.getElementById('add-btn');

  addBtn.addEventListener('click', function() {
    addRow();
  });

  table.addEventListener('click', function(event) {
    const target = event.target;

    if (target.classList.contains('edit-btn')) {
      handleEdit(target);
    } else if (target.classList.contains('save-btn')) {
      handleSave(target);
    } else if (target.classList.contains('delete-btn')) {
      handleDelete(target);
    }
  });

  function addRow() {
    const newRow = table.insertRow();
    newRow.innerHTML = `
      <td><input type="text" disabled></td>
      <td><input type="text" disabled></td>
      <td><input type="text" disabled></td>
      <td><input type="text" disabled></td>
      <td><input type="text" disabled></td>
      <td><input type="date" disabled></td>
      <td>
        <button class="save-btn" style="display: none;">Save</button>
        <button class="edit-btn">Edit</button>
        <button class="delete-btn">Delete</button>
      </td>
    `;
  }

  function handleEdit(btn) {
    const row = btn.closest('tr');
    const cells = row.cells;

    for (let i = 0; i < cells.length - 1; i++) {
      const input = cells[i].querySelector('input');
      if (input) {
        input.disabled = false;
      }
    }

    row.querySelector('.save-btn').style.display = 'inline-block';
    row.querySelector('.edit-btn').style.display = 'none';
    row.querySelector('.delete-btn').style.display = 'none';
  }

  function handleSave(btn) {
    const row = btn.closest('tr');
    const cells = row.cells;

    for (let i = 0; i < cells.length - 1; i++) {
      const input = cells[i].querySelector('input');
      if (input) {
        input.disabled = true;
      }
    }

    row.querySelector('.edit-btn').style.display = 'inline-block';
    row.querySelector('.delete-btn').style.display = 'inline-block';
    row.querySelector('.save-btn').style.display = 'none';
  }

  function handleDelete(btn) {
    const row = btn.closest('tr');
    row.remove();
  }
});
