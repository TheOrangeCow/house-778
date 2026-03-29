        const topRow = ['', '', ''];
        const middleRow = ['', '', ''];
        const bottomRow = ['', '', ''];
        let currentPlayer = 'x';

        const cells = document.querySelectorAll('.cell');
        const gameStatus = document.getElementById('gameStatus');
        const resetButton = document.getElementById('resetButton');

        function printBoard() {
            cells.forEach(cell => {
                const row = cell.getAttribute('data-row');
                const col = cell.getAttribute('data-col');
                const value = (row === '0' ? topRow[col] : row === '1' ? middleRow[col] : bottomRow[col]);
                cell.textContent = value;
            });
        }

        function check() {
            const lines = [
                [topRow[0], topRow[1], topRow[2]],
                [middleRow[0], middleRow[1], middleRow[2]],
                [bottomRow[0], bottomRow[1], bottomRow[2]],
                [topRow[0], middleRow[0], bottomRow[0]],
                [topRow[1], middleRow[1], bottomRow[1]],
                [topRow[2], middleRow[2], bottomRow[2]],
                [topRow[0], middleRow[1], bottomRow[2]],
                [topRow[2], middleRow[1], bottomRow[0]]
            ];

            lines.forEach(line => {
                if (line[0] && line[0] === line[1] && line[0] === line[2]) {
                    gameStatus.textContent = `${line[0].toUpperCase()} Wins!`;
                    disableBoard();
                }
            });

            if (![...topRow, ...middleRow, ...bottomRow].includes('')) {
                gameStatus.textContent = "It's a draw!";
            }
        }

        function disableBoard() {
            cells.forEach(cell => cell.classList.add('clicked'));
        }

        function minimax(board, depth, isMaximizing) {
            const scores = {
                'x': -10,
                '0': 10,
                'draw': 0
            };

            let result = checkWinner(board);
            if (result !== null) {
                return scores[result];
            }

            if (isMaximizing) {
                let best = -Infinity;
                for (let i = 0; i < 3; i++) {
                    for (let j = 0; j < 3; j++) {
                        if (board[i][j] === '') {
                            board[i][j] = '0';
                            best = Math.max(best, minimax(board, depth + 1, false));
                            board[i][j] = '';
                        }
                    }
                }
                return best;
            } 
            else {
                let best = Infinity;
                for (let i = 0; i < 3; i++) {
                    for (let j = 0; j < 3; j++) {
                        if (board[i][j] === '') {
                            board[i][j] = 'x'; 
                            best = Math.min(best, minimax(board, depth + 1, true));
                            board[i][j] = ''; 
                        }
                    }
                }
                return best;
            }
        }

        function checkWinner(board) {
            const lines = [
                [board[0][0], board[0][1], board[0][2]],
                [board[1][0], board[1][1], board[1][2]],
                [board[2][0], board[2][1], board[2][2]],
                [board[0][0], board[1][0], board[2][0]],
                [board[0][1], board[1][1], board[2][1]],
                [board[0][2], board[1][2], board[2][2]],
                [board[0][0], board[1][1], board[2][2]],
                [board[0][2], board[1][1], board[2][0]]
            ];

            for (let line of lines) {
                if (line[0] === line[1] && line[0] === line[2] && line[0] !== '') {
                    return line[0];
                }
            }

            if (![...board[0], ...board[1], ...board[2]].includes('')) {
                return 'draw';
            }

            return null;
        }

        function getBestMove(board) {
            let bestVal = -Infinity;
            let bestMove = [-1, -1];

            for (let i = 0; i < 3; i++) {
                for (let j = 0; j < 3; j++) {
                    if (board[i][j] === '') {
                        board[i][j] = '0';
                        let moveVal = minimax(board, 0, false);
                        board[i][j] = ''; 

                        if (moveVal > bestVal) {
                            bestMove = [i, j];
                            bestVal = moveVal;
                        }
                    }
                }
            }
            return bestMove;
        }

        function loop() {
            const board = [topRow.slice(), middleRow.slice(), bottomRow.slice()];

            const [row, col] = getBestMove(board);

            if (row === -1 || col === -1) return;

            if (row === 0) topRow[col] = '0';
            if (row === 1) middleRow[col] = '0';
            if (row === 2) bottomRow[col] = '0';

            currentPlayer = 'x'; 
            gameStatus.textContent = "Your turn (X)";
            check();
            printBoard();
        }

        cells.forEach(cell => {
            cell.addEventListener('click', function() {
                if (cell.textContent === '') {
                    const row = cell.getAttribute('data-row');
                    const col = cell.getAttribute('data-col');

                    if (currentPlayer === 'x') {
                        if (row === '0') topRow[col] = 'x';
                        if (row === '1') middleRow[col] = 'x';
                        if (row === '2') bottomRow[col] = 'x';
                        currentPlayer = '0';
                        gameStatus.textContent = "AI's turn (O)";
                    }

                    printBoard();
                    check();
                    if (currentPlayer === '0') loop();
                }
            });
        });

        resetButton.addEventListener('click', () => {
            topRow.fill('');
            middleRow.fill('');
            bottomRow.fill('');

            if(gameStatus.textContent ==  `X Wins!`){
                gameStatus.textContent = "AI's turn (O)";
                currentPlayer = '0';
            }else{
                gameStatus.textContent = "Your turn (X)";
                currentPlayer = 'x';
            }
            
            cells.forEach(cell => cell.classList.remove('clicked'));
            printBoard();
        });

        printBoard();