# Use a imagem oficial do Node.js como base
FROM node:16

# Defina o diretório de trabalho no container
WORKDIR /app

# Copie o package.json e package-lock.json para dentro do container
COPY package*.json ./

# Instale as dependências do Vue.js
RUN npm install

# Copie o restante dos arquivos do projeto para dentro do container
COPY . .

# Gere os arquivos estáticos para produção
RUN npm run build

# Exponha a porta que o app irá rodar
EXPOSE 8081

# Comando para rodar o app no container
CMD ["npm", "run", "dev"]
