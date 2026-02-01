# Protocolo de Edição (UTF-8)

Este tema filho deve permanecer sempre em UTF-8 sem BOM para evitar erros de acentuação.

## Regras
- Sempre salvar arquivos em UTF-8 (sem BOM).
- Evitar colar textos de fontes com encoding desconhecido.
- Se aparecer "Ã", "Â" ou "�", revise o encoding do arquivo.

## Como verificar encoding no VS Code (rápido)
1. Abra o arquivo no VS Code.
2. Veja o encoding no canto inferior direito (ex.: UTF-8).
3. Se não estiver em UTF-8, clique e escolha "Salvar com codificação" > "UTF-8".

## Verificador de encoding
- Execute no terminal: `php tools/check-encoding.php`
- Resultado OK: `OK: nenhum problema de encoding encontrado.`