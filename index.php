<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Trabalho Fabiano</title>
    <meta charset="utf-8">
	<link rel="stylesheet" href="pag.css">
	<link rel="shortcut icon" href="assets/img/imag.webp" type="image/x-icon">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>
  <body>

	<div class="topnav">
		<a class="active" href="#home"><img src="assets/img/imag.webp" alt="" width="30" height="30" /></a>
	  </div>
	 
<br><br><br><br>
		<form action="app/controller/UserController.php" method="POST">
			<center>      
				<input type="text" name="nome" placeholder="Nome" required>
				<br>
				<input type="text" name="sobrenome" placeholder="Ultimo Nome" required>
				<br>
				<input type="text" name="idade" placeholder="Idade" required>
				<br>
				<input type="text" name="cep" id="cep" placeholder="CEP" required>		
				<br>
				<input type="text" name="bairro" id="bairro" placeholder="Bairro" readonly>	
				<br>
				<input type="text" name="rua" id="rua" placeholder="Rua" readonly>
                <br>
				<input type="text" name="cidade" id="cidade" placeholder="Cidade" readonly>
				<br>
				<input type="text" name="estado" id="estado" placeholder="Estado" readonly>
                <br>
				<input type="text" name="numero" placeholder="Nº" required>
				<br>
				<input type="text" name="cpf" id="cpf" placeholder="CPF" required>
				<br>
				<input type="text" name="genero" placeholder="Gênero" required>
				<br>
				<input type="submit" name="cadastrarUsuario" button class="btn">
</center>	

			
		</form>


		<script>
			const cepInput = document.getElementById('cep');
			const logradouroInput  = document.getElementById('rua');
			const bairroInput = document.getElementById('bairro');
			const cidadeInput = document.getElementById('cidade');
			const estadoInput = document.getElementById('estado');
	
			cepInput.addEventListener('blur', () => {
				const cep = cepInput.value.replace(/\D/g, '');
				if (cep.length === 8) {
					fetch(`https://viacep.com.br/ws/${cep}/json/`)
						.then(response => response.json())
						.then(data => {
							if (!data.erro) {
								logradouroInput.value = data.logradouro;
								bairroInput.value = data.bairro;
								cidadeInput.value = data.localidade;
								estadoInput.value = data.uf;
							} else {
								alert('CEP não encontrado.');
							}
						})
						.catch(error => console.error(error));
				}
			});
		</script>

<script>
	const cpfInput = document.getElementById('cpf');

	cpfInput.addEventListener('input', () => {
		let value = cpfInput.value.replace(/\D/g, '');

		if (value.length > 11) {
			value = value.slice(0, 11);
		}

		if (value.length > 9) {
			value = value.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
		} else if (value.length > 6) {
			value = value.replace(/(\d{3})(\d{3})(\d{3})/, '$1.$2.$3');
		} else if (value.length > 3) {
			value = value.replace(/(\d{3})(\d{3})/, '$1.$2');
		}

		cpfInput.value = value;
	});
</script>


<div class="footer">
	<p> Dupla: Abner, Alvaro;</p>
  </div>
  
  </body>
</html>