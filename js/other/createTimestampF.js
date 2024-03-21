var createTimestampF = function () {
    const now = moment();
    const formattedTime = now.format("h:mm A");
    return formattedTime;
}

var formatTimestampFunctionSystem = function (unixTimestamp) {
    const now = moment();
    const currUserTimestamp = moment(unixTimestamp);
    const oneDayOver = now.diff(currUserTimestamp, "days");
  
    if (oneDayOver >= 1) {
      const formattedTime = currUserTimestamp.format("DD.MM");
      return formattedTime;
    } else {
      const formattedTime = currUserTimestamp.format("h:mm A");
      return formattedTime;
    }
  };