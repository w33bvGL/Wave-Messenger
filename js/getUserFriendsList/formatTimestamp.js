function formatTimestamp(unixTimestamp) {
    const now = moment();
    const currUserTimestamp = moment(unixTimestamp);
    const oneDayOver = now.diff(currUserTimestamp, 'days');

    if (oneDayOver >= 1) {
        const formattedTime = currUserTimestamp.format("dddd, MMMM Do, YYYY h:mm A");
        return formattedTime;
    } else {
        const formattedTime = currUserTimestamp.format("h:mm A");
        return formattedTime;
    }
}
