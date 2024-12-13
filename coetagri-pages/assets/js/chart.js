let carrinho = [];

document.querySelectorAll('.add-to-cart').forEach(button => {
  button.addEventListener('click', () => {
    const product = button.getAttribute('data-product');
    let item = carrinho.find(p => p.nome === product);
    if (item) {
      item.quantidade += 1;
    } else {
      carrinho.push({ nome: product, quantidade: 1 });
    }
    alert(`${product} foi adicionado ao carrinho`);
  });
});

document.getElementById('view-cart').addEventListener('click', () => {
  if (carrinho.length > 0) {
    let lista = carrinho.map(item => `
    <li>
        ${item.nome} - Quantidade: <br>
        <input type="number" value="${item.quantidade}" min="1" data-product="${item.nome}" style="width: 60px;" class="quantity-input"> 
        <button class="btn btn-danger btn-sm remove-from-cart" data-product="${item.nome}">Remover</button>
    </li>
`).join('');

    document.getElementById('cart-items').innerHTML = `<ul>${lista}</ul>`;
    document.getElementById('cart-popup').style.display = 'block';

    document.querySelectorAll('.quantity-input').forEach(input => {
      input.addEventListener('change', (e) => {
        const product = e.target.getAttribute('data-product');
        const quantidade = parseInt(e.target.value);
        if (quantidade < 1) {
          alert("A quantidade não pode ser menor que 1.");
          e.target.value = 1;
          return;
        }
        let item = carrinho.find(p => p.nome === product);
        if (item) {
          item.quantidade = quantidade;
        }
      });
    });

    document.querySelectorAll('.remove-from-cart').forEach(button => {
      button.addEventListener('click', (e) => {
        const product = e.target.getAttribute('data-product');
        carrinho = carrinho.filter(p => p.nome !== product);
        e.target.parentElement.remove();
      });
    });

  } else {
    alert('O carrinho está vazio.');
  }
});

document.getElementById('close-cart-popup').addEventListener('click', () => {
  document.getElementById('cart-popup').style.display = 'none';
});

document.getElementById('comprar').addEventListener('click', () => {
  if (carrinho.length > 0) {
    const mensagem = `Gostaria de comprar os seguintes itens: ${carrinho.map(item => item.nome + ' (Quantidade: ' + item.quantidade + ')').join(', ')}`;
    const numeroWhatsApp = '553532959716';
    const urlWhatsApp = `https://api.whatsapp.com/send?phone=${numeroWhatsApp}&text=${encodeURIComponent(mensagem)}`;
    window.open(urlWhatsApp, '_blank');
  } else {
    alert('O carrinho está vazio.');
  }
});