import React, { useState } from 'react';
import ReactDOM from 'react-dom';

const rowStyle = {
  display: 'flex'
}

const squareStyle = {
  'width':'60px',
  'height':'60px',
  'backgroundColor': '#ddd',
  'margin': '4px',
  'display': 'flex',
  'justifyContent': 'center',
  'alignItems': 'center',
  'fontSize': '20px',
  'color': 'black'
}

const boardStyle = {
  'backgroundColor': '#eee',
  'width': '208px',
  'alignItems': 'center',
  'justifyContent': 'center',
  'display': 'flex',
  'flexDirection': 'column',
  'border': '3px #eee solid'
}

const containerStyle = {
  'display': 'flex',
  'alignItems': 'center',
  'flexDirection': 'column'
}

const instructionsStyle = {
  'marginTop': '5px',
  'marginBottom': '5px',
  'fontWeight': 'bold',
  'fontSize': '16px',
}

const buttonStyle = {
  'marginTop': '15px',
  'marginBottom': '16px',
  'width': '80px',
  'height': '40px',
  'backgroundColor': '#8acaca',
  'color': 'white',
  'fontSize': '16px',
}

function Square({value, handleClick}) {
  return (
    <div
      onClick={() => handleClick()}
      className="square"
      style={squareStyle}>
      {value}
    </div>
  );
}

function Board() {

  const [squares, setSquares] = useState(Array(9).fill(null));
  const [x, setX] = useState(true);
  const [winner, setWinner] = useState("None");

  function cellClicked(i) {
    
    const current = squares[i];

    if (current === null) {

      squares[i] = x ? "X" : "O";
      setSquares(squares);
      setX(!x);

      let winnerPlayer = checkTheWinner();
      if (winnerPlayer) {
        setWinner(winnerPlayer);
      }
    } else {
      return false;
    }
  }

  function checkTheWinner() {

    const winPoints = [
      [0,1,2],
      [3,4,5],
      [6,7,8],
      [0,3,6],
      [1,4,7],
      [2,5,8],
      [0,4,8],
      [2,4,6]
    ];

    for(var k = 0; k < winPoints.length; k++) {

      const [rowX, rowY, rowZ] = winPoints[k];

      if(squares[rowX] && squares[rowX] == squares[rowY] && squares[rowX] == squares[rowZ]) {
        
        return squares[rowX];
      }

    }

    return null;

  }

  function resetGame() {
    setSquares(Array(9).fill(null));
    setX(true);
    setWinner("None");
  }

  return (
    <div style={containerStyle} className="gameBoard">
      {
        winner != "None" && (
          <div id="statusArea" className="status" style={instructionsStyle}>Winner Player Is { winner }</div>
        )
      }
      <div id="statusArea" className="status" style={instructionsStyle}>Next player: <span> { x ? "X" : "O" } </span></div>
      <div id="winnerArea" className="winner" style={instructionsStyle}>Winner: <span> {winner} </span></div>
      <button onClick={() => resetGame()} style={buttonStyle}>Reset</button>
      <div style={boardStyle}>
        <div className="board-row" style={rowStyle}>
          <Square value={squares[0]} handleClick={() => cellClicked(0)} />
          <Square value={squares[1]} handleClick={() => cellClicked(1)} />
          <Square value={squares[2]} handleClick={() => cellClicked(2)} />
        </div>
        <div className="board-row" style={rowStyle}>
          <Square value={squares[3]} handleClick={() => cellClicked(3)} />
          <Square value={squares[4]} handleClick={() => cellClicked(4)} />
          <Square value={squares[5]} handleClick={() => cellClicked(5)} />
        </div>
        <div className="board-row" style={rowStyle}>
          <Square value={squares[6]} handleClick={() => cellClicked(6)} />
          <Square value={squares[7]} handleClick={() => cellClicked(7)} />
          <Square value={squares[8]} handleClick={() => cellClicked(8)} />
        </div>
      </div>
    </div>
  );
}

function Game() {
  return (
    <div className="game">
      <div className="game-board">
        <Board />
      </div>
    </div>
  );
}

ReactDOM.render(
  <Game />,
  document.getElementById('root')
);