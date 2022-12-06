/**
 * Limit length of a string and add ellipsis
 *
 * @param length
 * @returns {String|string}
 */

String.prototype.limit = function (length) {
    if (this.length < length) {
        return this;
    }
    return this.substring(0, length) + '...';
};

/**
 *
 * @returns {*}
 */
String.prototype.nl2br = function() {
    return this.replace(/\n/g, '<br />');
}